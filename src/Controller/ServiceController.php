<?php

namespace App\Controller;

use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

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

        $osmTag  = $osmTags[$nom] ?? null;
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
    public function overpassProxy(Request $request): Response
    {
        set_time_limit(60);

        $query = $request->query->get('query');

        if (!$query) {
            return $this->json(['error' => 'Missing query'], 400);
        }

        $servers = [
            'http://overpass.kumi.systems/api/interpreter',
            'http://overpass-api.de/api/interpreter',
            'http://lz4.overpass-api.de/api/interpreter',
        ];

        foreach ($servers as $i => $server) {
            $url = $server . '?data=' . urlencode($query);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, $i === 0 ? 15 : 45);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'PremiumExperience/1.0');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $response  = curl_exec($ch);
            $httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlError = curl_error($ch);
            curl_close($ch);

            if ($response && $httpCode === 200) {
                return new Response($response, 200, ['Content-Type' => 'application/json']);
            }

            error_log("Overpass $server failed: HTTP $httpCode, cURL: $curlError");
        }

        return $this->json(['error' => 'Overpass unavailable'], 503);
    }
}
