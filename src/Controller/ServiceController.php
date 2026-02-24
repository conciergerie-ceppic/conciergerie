<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServiceController extends AbstractController
{
    #[Route('/service/{nom}', name: 'app_service')]
    public function detail(string $nom): Response
    {
        return $this->render('service/index.html.twig', [
            'nom' => $nom,
        ]);
    }

}
