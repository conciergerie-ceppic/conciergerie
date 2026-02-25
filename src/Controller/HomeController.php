<?php

namespace App\Controller;

use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\App;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class HomeController extends AbstractController
{
   #[Route('/', name: 'app_home')]
public function index(
    Request $request,
    HttpClientInterface $hci,
    ServiceRepository $serviceRepo
): Response {
    $services        = $this->listServices();
    $session         = $request->getSession();
    $lat             = $session->get('lat');
    $lon             = $session->get('lon');
    $ville           = null;
    $servicesProches = []; // ✅ Toujours initialisé

    if (is_numeric($lat) && is_numeric($lon)) {
        $ville = $this->getVille($hci, (float) $lat, (float) $lon);
        $session->set('ville', $ville);

        $servicesProches = $serviceRepo->findByProximiteAvecDistance(
            (float) $lat,
            (float) $lon,
            10
        );
    } else {
        $ville = $session->get('ville');
    }

    return $this->render('home/index.html.twig', [
        'services'         => $services,
        'lat'              => $lat,
        'lon'              => $lon,
        'ville'            => $ville,
        'services_proches' => $servicesProches, // ✅ Toujours un tableau, jamais undefined
    ]);
}

    /// Autres méthodes

    // Récupère la liste des services dans Enum
    public function listServices()
    {
        $list = \App\Enum\ServiceCategory::cases();
        return   $list;
    }

    // Récupère la location de l'utilisateur via le script js et la stocke dans la session
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

    // API pour définir la ville selon la localisation
    public function getVille(HttpClientInterface $hci, float $lat, float $lon) {
        $url = "https://nominatim.openstreetmap.org/reverse?lat=$lat&lon=$lon&format=json";
        $response = $hci->request('GET', $url);
        $data = $response->toArray();
        return $data['address']['town'] ?? null;
    }
}
