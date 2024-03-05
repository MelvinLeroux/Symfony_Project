<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 75)]
    private ?string $name = null;
    
    #[ORM\Column(nullable: true)]
    private ?int $lifespan = null;

    #[ORM\Column(nullable: true)]
    private ?int $weight = null;

    #[ORM\Column(nullable: true)]
    private ?int $height = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $lifestyle = null;

    #[ORM\Column(length: 50)]
    private ?string $diet = null;

    #[ORM\Column(nullable: true)]
    private ?int $gestation_period = null;

    #[ORM\ManyToMany(targetEntity: Origin::class, mappedBy: 'country')]
    private Collection $origins;

    #[ORM\ManyToOne(inversedBy: 'name')]
    private ?Family $family = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    public function __construct()
    {
        $this->origins = new ArrayCollection();
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

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(?string $family): static
    {
        $this->family = $family;

        return $this;
    }

    

    public function getLifespan(): ?int
    {
        return $this->lifespan;
    }

    public function setLifespan(?int $lifespan): static
    {
        $this->lifespan = $lifespan;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getLifestyle(): ?string
    {
        return $this->lifestyle;
    }

    public function setLifestyle(?string $lifestyle): static
    {
        $this->lifestyle = $lifestyle;

        return $this;
    }

    public function getDiet(): ?string
    {
        return $this->diet;
    }

    public function setDiet(string $diet): static
    {
        $this->diet = $diet;

        return $this;
    }

    public function getGestationPeriod(): ?int
    {
        return $this->gestation_period;
    }

    public function setGestationPeriod(?int $gestation_period): static
    {
        $this->gestation_period = $gestation_period;

        return $this;
    }

    /**
     * @return Collection<int, Origin>
     */
    public function getOrigins(): Collection
    {
        return $this->origins;
    }

    public function addOrigin(Origin $origin): static
    {
        if (!$this->origins->contains($origin)) {
            $this->origins->add($origin);
            $origin->addCountry($this);
        }

        return $this;
    }

    public function removeOrigin(Origin $origin): static
    {
        if ($this->origins->removeElement($origin)) {
            $origin->removeCountry($this);
        }

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }
}
