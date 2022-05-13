<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
#[ApiResource]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nom;

    #[ORM\OneToMany(mappedBy: 'service', targetEntity: division::class)]
    private $division;

    #[ORM\ManyToOne(targetEntity: Direction::class, inversedBy: 'service')]
    #[ORM\JoinColumn(nullable: false)]
    private $direction;

    public function __construct()
    {
        $this->division = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, division>
     */
    public function getDivision(): Collection
    {
        return $this->division;
    }

    public function addDivision(division $division): self
    {
        if (!$this->division->contains($division)) {
            $this->division[] = $division;
            $division->setService($this);
        }

        return $this;
    }

    public function removeDivision(division $division): self
    {
        if ($this->division->removeElement($division)) {
            // set the owning side to null (unless already changed)
            if ($division->getService() === $this) {
                $division->setService(null);
            }
        }

        return $this;
    }

    public function getDirection(): ?Direction
    {
        return $this->direction;
    }

    public function setDirection(?Direction $direction): self
    {
        $this->direction = $direction;

        return $this;
    }
}
