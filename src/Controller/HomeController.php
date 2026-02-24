<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\App;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $services = $this->listServices();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'services' => $services,
        ]);
    }

    /// Autres méthodes

    // Récupère la liste des services dans Enum
    public function listServices()
    {
        $list = \App\Enum\ServiceCategory::cases();
        return   $list;
    }
}
