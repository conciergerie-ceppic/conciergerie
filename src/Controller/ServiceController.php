<?php

namespace App\Controller;

use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class ServiceController extends AbstractController
{
    #[Route('/service/{nom}', name: 'app_service')]
    public function detail(
        string $nom,
        ServiceRepository $sr,
        Request $request
    ): Response {

        if ($nom === 'allservices') {
            return $this->render('service/all_services.html.twig');
        }

        $service = $sr->findOneBy(['name' => $nom]);

        if (!$service) {
            throw $this->createNotFoundException("Service \"$nom\" introuvable.");
        }

        if (!$this->getUser()) {
            return $this->render('service/description.html.twig', [
                'service' => $service,
            ]);
        }

        $osmTags = [
            'hotel'      => ['tourism', 'hotel'],
            'restaurant' => ['amenity', 'restaurant'],
            'spa'        => ['leisure', 'spa'],
            'event'      => ['amenity', 'theatre'],
            'travel'     => ['tourism', 'travel_agency'],
            'vehicle'    => ['amenity', 'car_rental'],
            'activity'   => ['leisure', 'sports_centre'],
        ];

        $osmTag = $osmTags[$nom] ?? null;

        $session = $request->getSession();

        return $this->render('service/index.html.twig', [
            'service' => $service,
            'osmKey'  => $osmTag ? $osmTag[0] : null,
            'osmVal'  => $osmTag ? $osmTag[1] : null,
            'userLat' => $session->get('lat'),
            'userLon' => $session->get('lon'),
        ]);
    }

    #[Route('/api/overpass', name: 'api_overpass', methods: ['GET'])]
    public function overpassProxy(
        Request $request,
        HttpClientInterface $client
    ): Response {

        $query = $request->query->get('query');

        if (!$query) {
            return $this->json(['error' => 'Missing query'], 400);
        }

        $servers = [
            'https://overpass.kumi.systems/api/interpreter',
            'https://overpass-api.de/api/interpreter',
            'https://overpass.openstreetmap.fr/api/interpreter'
        ];

        foreach ($servers as $server) {

            try {

                $response = $client->request('GET', $server, [
                    'query' => ['data' => $query],
                    'timeout' => 50,
                    'headers' => [
                        'User-Agent' => 'PremiumExperience/1.0'
                    ]
                ]);

                if ($response->getStatusCode() === 200) {

                    return new Response(
                        $response->getContent(),
                        200,
                        ['Content-Type' => 'application/json']
                    );

                }

            } catch (\Exception $e) {
                error_log("Overpass $server failed: " . $e->getMessage());
            }
        }

        return $this->json(['error' => 'Overpass unavailable'], 503);
    }
}