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
        HttpClientInterface $client,
        Request $request
    ): Response {
        $service = $sr->findOneBy(['name' => $nom]);

        if (!$service) {
            throw $this->createNotFoundException("Service \"$nom\" introuvable.");
        }

        // Si l'utilisateur n'est pas connecté, on affiche juste la description
        if (!$this->getUser()) {
            return $this->render('service/description.html.twig', [
                'service' => $service,
            ]);
        }

        $session = $request->getSession();
        $userLat = (float) $session->get('lat');
        $userLon = (float) $session->get('lon');

        $partners = $service->getPartners()->toArray();
        $distances = [];

        if ($userLat && $userLon) {
            foreach ($partners as $partner) {
                $coords = $this->convertAdress($partner->getAddress(), $client);
                $distances[$partner->getId()] = $coords
                    ? $this->haversine($userLat, $userLon, (float)$coords['lat'], (float)$coords['lon'])
                    : null;
            }

            // Trie les partners du plus proche au plus loin
            usort($partners, function($a, $b) use ($distances) {
                $dA = $distances[$a->getId()] ?? PHP_FLOAT_MAX;
                $dB = $distances[$b->getId()] ?? PHP_FLOAT_MAX;
                return $dA <=> $dB;
            });
        }

        return $this->render('service/index.html.twig', [
            'service'   => $service,
            'partners'  => $partners,
            'distances' => $distances,
        ]);
    }

    public function convertAdress(string $address, HttpClientInterface $client): ?array
    {
        $url = "https://nominatim.openstreetmap.org/search?format=json&limit=1&q="
            . urlencode($address);

        $response = $client->request('GET', $url, [
            'headers' => ['User-Agent' => 'conciergerie/1.0']
        ]);

        $data = $response->toArray();

        return empty($data) ? null : [
            'lat' => $data[0]['lat'],
            'lon' => $data[0]['lon'],
        ];
    }

    private function haversine(float $lat1, float $lon1, float $lat2, float $lon2): float
    {
        $earthRadius = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) ** 2
            + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) ** 2;

        return $earthRadius * 2 * atan2(sqrt($a), sqrt(1 - $a));
    }
}