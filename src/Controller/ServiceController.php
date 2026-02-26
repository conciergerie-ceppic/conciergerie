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
        $services = $sr->findService($nom);

        if (!$services) {
            throw $this->createNotFoundException();
        }

        // Récupération de la géoloc depuis la session (stockée par HomeController)
        $session = $request->getSession();
        $userLat = (float) $session->get('lat');
        $userLon = (float) $session->get('lon');


        $coords = $this->convertAdress($services[0]['address'], $client);
        
        return $this->render('service/index.html.twig', [
            'nom' => $nom,
            'services' => $services,
            'coords' => $coords,
        ]);
    }

    /**
     * Convertit une adresse en coordonnées GPS via Nominatim
     */
    public function convertAdress(string $address, HttpClientInterface $client): ?array
    {
        $url = "https://nominatim.openstreetmap.org/search?format=json&limit=1&q="
            . urlencode($address);

        $response = $client->request('GET', $url, [
            'headers' => [
                'User-Agent' => 'conciergerie/1.0'
            ]
        ]);

        $data = $response->toArray();

        if (empty($data)) {
            return null;
        }

        return [
            'lat' => $data[0]['lat'],
            'lon' => $data[0]['lon'],
        ];
        
    }

    /**
     * Calcule la distance en km entre deux points GPS (formule Haversine)
     */
    private function haversine(float $lat1, float $lon1, float $lat2, float $lon2): float
    {

        $earthRadius = 6371; // km

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) ** 2
            + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) ** 2;

        return $earthRadius * 2 * atan2(sqrt($a), sqrt(1 - $a));
    }
}
