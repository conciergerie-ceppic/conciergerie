<?php

namespace App\Controller;

use App\Repository\PartnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PartnerController extends AbstractController
{
    #[Route('/partner/{id}', name: 'app_partner_detail')]
    public function detail(int $id, PartnerRepository $partnerRepository): Response
    {
        $partner = $partnerRepository->find($id);

        if (!$partner) {
            throw $this->createNotFoundException();
        }

        return $this->render('partner/detail.html.twig', [
            'partner' => $partner,
        ]);
    }
}
