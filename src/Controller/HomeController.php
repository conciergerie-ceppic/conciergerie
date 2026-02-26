<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\App;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, UserRepository $userRepository): Response
    {
        $services = $this->listServices();
        return $this->render('home/index.html.twig', [
            'services' => $services,
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
}

/* -originalName: "8d3lova9kj961.webp"
  -mimeType: "image/webp"
  -error: 0
  -originalPath: "8d3lova9kj961.webp" */
//   extraire du nom de mon image l'extension pour la convertir en webp et la stocker dans le dossier public/assets/img/uploads/avatars