<?php

namespace App\Entity;

use App\Repository\FamilyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FamilyRepository::class)]
class Family
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: Animal::class, mappedBy: 'family')]
    private Collection $name;

    public function __construct()
    {
        $this->name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getName(): Collection
    {
        return $this->name;
    }

    public function addName(Animal $name): static
    {
        if (!$this->name->contains($name)) {
            $this->name->add($name);
            $name->setFamily($this);
        }

        return $this;
    }

    public function removeName(Animal $name): static
    {
        if ($this->name->removeElement($name)) {
            // set the owning side to null (unless already changed)
            if ($name->getFamily() === $this) {
                $name->setFamily(null);
            }
        }

        return $this;
    }
}
