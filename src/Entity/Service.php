<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $osm_key = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $osm_val = null;

    /**
     * @var Collection<int, Partner>
     */
    #[ORM\OneToMany(targetEntity: Partner::class, mappedBy: 'service')]
    private Collection $partners;

    public function __construct()
    {
        $this->partners = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getName(): ?string { return $this->name; }
    public function setName(string $name): static { $this->name = $name; return $this; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): static { $this->description = $description; return $this; }

    public function getOsmKey(): ?string { return $this->osm_key; }
    public function setOsmKey(?string $osm_key): static { $this->osm_key = $osm_key; return $this; }

    public function getOsmVal(): ?string { return $this->osm_val; }
    public function setOsmVal(?string $osm_val): static { $this->osm_val = $osm_val; return $this; }

    public function getPartners(): Collection { return $this->partners; }

    public function addPartner(Partner $partner): static
    {
        if (!$this->partners->contains($partner)) {
            $this->partners->add($partner);
            $partner->setService($this);
        }
        return $this;
    }

    public function removePartner(Partner $partner): static
    {
        if ($this->partners->removeElement($partner)) {
            if ($partner->getService() === $this) {
                $partner->setService(null);
            }
        }
        return $this;
    }
}
