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

    // ✅ $user au lieu de $user_id → colonne "user_id" en BDD
    #[ORM\ManyToOne(inversedBy: 'userFavoritePartners')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    // ✅ $partner au lieu de $partner_id → colonne "partner_id" en BDD
    #[ORM\ManyToOne(inversedBy: 'userFavoritePartners')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Partner $partner = null;

    public function getId(): ?int { return $this->id; }

    public function getUser(): ?User { return $this->user; }
    public function setUser(?User $user): static { $this->user = $user; return $this; }

    public function getPartner(): ?Partner { return $this->partner; }
    public function setPartner(?Partner $partner): static { $this->partner = $partner; return $this; }
}