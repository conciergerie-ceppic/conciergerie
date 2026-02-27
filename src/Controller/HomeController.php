<?php

namespace App\Controller;

use App\Repository\ServiceRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, HttpClientInterface $hci, ServiceRepository $sr): Response
    {
        $session = $request->getSession();
        $lat = $session->get('lat');
        $lon = $session->get('lon');

        $ville = null;
        if ($lat && $lon) {
            $ville = $this->getVille($hci, (float)$lat, (float)$lon);
            $session->set('ville', $ville);
        }

        // Récupère les services depuis la BDD
        $services = $sr->findAll();

        return $this->render('home/index.html.twig', [
            'services' => $services,
            'lat' => $lat,
            'lon' => $lon,
            'ville' => $ville,
        ]);
    }

    #[Route('/save-location', name: 'save_location')]
    public function saveLocation(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $lat = $data['lat'] ?? null;
        $lon = $data['lon'] ?? null;

        $session = $request->getSession();
        $session->set('lat', $lat);
        $session->set('lon', $lon);

        return new Response('ok');
    }

    public function getVille(HttpClientInterface $hci, float $lat, float $lon): ?string
    {
        $url = "https://nominatim.openstreetmap.org/reverse?lat=$lat&lon=$lon&format=json";
        $response = $hci->request('GET', $url, [
            'headers' => ['User-Agent' => 'conciergerie/1.0']
        ]);
        $data = $response->toArray();
        return $data['address']['town'] ?? $data['address']['city'] ?? null;
    }
}