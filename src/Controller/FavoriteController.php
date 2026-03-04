<?php

namespace App\Controller;

use App\Entity\UserFavoritePartner;
use App\Repository\PartnerRepository;
use App\Repository\UserFavoritePartnerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
final class FavoriteController extends AbstractController
{
    #[Route('/favorite/toggle/{partnerId}', name: 'favorite_toggle', methods: ['POST'])]
    public function toggle(
        int $partnerId,
        PartnerRepository $partnerRepository,
        UserFavoritePartnerRepository $favoriteRepository,
        EntityManagerInterface $em
    ): JsonResponse {
        $user = $this->getUser();
        $partner = $partnerRepository->find($partnerId);

        if (!$partner) {
            return new JsonResponse(['error' => 'Partenaire introuvable'], 404);
        }

        // Vérifie si le favori existe déjà
        $existing = $favoriteRepository->findOneBy([
            'user_id' => $user,
            'partner_id' => $partner,
        ]);

        if ($existing) {
            // Supprime le favori
            $em->remove($existing);
            $em->flush();
            return new JsonResponse(['status' => 'removed']);
        }

        // Ajoute le favori
        $favorite = new UserFavoritePartner();
        $favorite->setUserId($user);
        $favorite->setPartnerId($partner);
        $em->persist($favorite);
        $em->flush();

        return new JsonResponse(['status' => 'added']);
    }
}