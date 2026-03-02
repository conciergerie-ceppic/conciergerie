<?php

namespace App\Controller;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\App;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, HttpClientInterface $hci,UserRepository $ur): Response
    {
        $services = $this->listServices();
        $session = $request->getSession();
        $lat = $session->get('lat');
        $lon = $session->get('lon');
        $ville = $this->getVille($hci,(float)$lat,(float)$lon);
        $session->set('ville',$ville);

        return $this->render('home/index.html.twig', [
            'services' => $services,
            'lat' => $lat,
            'lon' => $lon,
            'ville' => $ville,

        ]);
    }

    #[Route('/uploadAvatar', name: 'upload_avatar')]
    public function uploadAvatar(Request $request, UserRepository $userRepository): Response
    {
        $avatar = $request->files->get('avatar');
        // dd($avatar);
        $directory = $this->getParameter('avatars_directory').'/';
        // dd($directory);
        $error = [];
        $originalName = $avatar->getClientOriginalName();
        $originalName = explode('.', $originalName);
        $pathName = $avatar->getPathname();
        // dd($originalName);
        // dd($pathName);
        $image = new \Gumlet\ImageResize($pathName);
        $image->resizeToWidth(48);
        $image->save($directory .$originalName[0].".webp", IMAGETYPE_WEBP);
        
        // supprimer l'image ou l'uploader dans un catalogue si assez de temps
        $userRepository->setAvatar($this->getUser()->getId() ,$originalName[0].".webp"); 
        return $this->redirectToRoute('app_home');
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

        return $this->redirectToRoute('app_home');
    }

    // API pour définir la ville selon la localisation
    public function getVille(HttpClientInterface $hci, float $lat, float $lon) {
        $url = "https://nominatim.openstreetmap.org/reverse?lat=$lat&lon=$lon&format=json";
        $response = $hci->request('GET', $url);
        $data = $response->toArray();
        return $data['address']['town'] ?? null;
    }

}
