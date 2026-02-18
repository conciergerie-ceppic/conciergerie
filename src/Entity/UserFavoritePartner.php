<?php

namespace App\Entity;

use App\Repository\UserFavoritePartnerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserFavoritePartnerRepository::class)]
class UserFavoritePartner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'userFavoritePartners')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user_id = null;

    #[ORM\ManyToOne(inversedBy: 'userFavoritePartners')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Partner $partner_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getPartnerId(): ?Partner
    {
        return $this->partner_id;
    }

    public function setPartnerId(?Partner $partner_id): static
    {
        $this->partner_id = $partner_id;

        return $this;
    }
}
