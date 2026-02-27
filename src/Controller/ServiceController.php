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

        // Récupération de la géoloc depuis la session
        $session = $request->getSession();
        $userLat = (float) $session->get('lat');
        $userLon = (float) $session->get('lon');

        // Récupération des partners liés à ce service
        $partners = $service->getPartners()->toArray();

        // Tri par proximité si la géoloc est disponible
        if ($userLat && $userLon) {
            $partners = $this->orderByProximity($partners, $userLat, $userLon, $client);
        }

        return $this->render('service/index.html.twig', [
            'service' => $service,
            'partners' => $partners,
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

    private function orderByProximity(
        array $partners,
        float $userLat,
        float $userLon,
        HttpClientInterface $client
    ): array {
        foreach ($partners as &$partner) {
            $coords = $this->convertAdress($partner->getAddress(), $client);

            $partner->distance = $coords
                ? $this->haversine($userLat, $userLon, (float) $coords['lat'], (float) $coords['lon'])
                : PHP_FLOAT_MAX;
        }
        unset($partner);

        usort($partners, fn($a, $b) => $a->distance <=> $b->distance);

        return $partners;
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