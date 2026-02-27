<?php

namespace App\Entity;

use App\Repository\PartnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: PartnerRepository::class)]
class Partner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link = null;

    #[ORM\ManyToOne(targetEntity: Service::class, inversedBy: 'partners')]
    #[ORM\JoinColumn(name: 'service_id', referencedColumnName: 'id', nullable: true)]
    private ?Service $service = null;

    /**
     * @var Collection<int, UserFavoritePartner>
     */
    #[ORM\OneToMany(targetEntity: UserFavoritePartner::class, mappedBy: 'partner_id')]
    private Collection $userFavoritePartners;

    public function __construct()
    {
        $this->userFavoritePartners = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): static
    {
        $this->link = $link;
        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): static
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return Collection<int, UserFavoritePartner>
     */
    public function getUserFavoritePartners(): Collection
    {
        return $this->userFavoritePartners;
    }

    public function addUserFavoritePartner(UserFavoritePartner $userFavoritePartner): static
    {
        if (!$this->userFavoritePartners->contains($userFavoritePartner)) {
            $this->userFavoritePartners->add($userFavoritePartner);
            $userFavoritePartner->setPartnerId($this);
        }
        return $this;
    }

    public function removeUserFavoritePartner(UserFavoritePartner $userFavoritePartner): static
    {
        if ($this->userFavoritePartners->removeElement($userFavoritePartner)) {
            if ($userFavoritePartner->getPartnerId() === $this) {
                $userFavoritePartner->setPartnerId(null);
            }
        }
        return $this;
    }
}
