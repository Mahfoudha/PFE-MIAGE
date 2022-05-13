<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
#[ApiResource]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $nni;

    #[ORM\Column(type: 'date')]
    private $date_de_naissance;

    #[ORM\Column(type: 'string', length: 60)]
    private $nom;

    #[ORM\Column(type: 'string', length: 60)]
    private $prenom;

    #[ORM\Column(type: 'integer')]
    private $matricule;

    #[ORM\Column(type: 'string', length: 70)]
    private $email;

    #[ORM\Column(type: 'string', length: 70)]
    private $adresse;

    #[ORM\Column(type: 'integer')]
    private $telephone;

    #[ORM\Column(type: 'string', length: 40)]
    private $sexe;

    #[ORM\Column(type: 'date')]
    private $date_recrutement;

    #[ORM\Column(type: 'string', length: 50)]
    private $fonction;

    #[ORM\OneToMany(mappedBy: 'employe', targetEntity: Diplome::class)]
    private $Diplome;

    #[ORM\ManyToOne(targetEntity: status::class, inversedBy: 'employes')]
    #[ORM\JoinColumn(nullable: false)]
    private $status;

    #[ORM\OneToMany(mappedBy: 'employe', targetEntity: experience::class)]
    private $experience;

    #[ORM\ManyToMany(targetEntity: competence::class, inversedBy: 'employes')]
    private $competence;

    #[ORM\ManyToMany(targetEntity: competenceLinguistique::class, inversedBy: 'employes')]
    private $competence_linguistique;

    #[ORM\ManyToMany(targetEntity: projet::class, inversedBy: 'employes')]
    private $projet;

    #[ORM\ManyToOne(targetEntity: role::class, inversedBy: 'employes')]
    #[ORM\JoinColumn(nullable: false)]
    private $role;

    #[ORM\ManyToOne(targetEntity: division::class, inversedBy: 'employes')]
    #[ORM\JoinColumn(nullable: false)]
    private $division;

    public function __construct()
    {
        $this->Diplome = new ArrayCollection();
        $this->experience = new ArrayCollection();
        $this->competence = new ArrayCollection();
        $this->competence_linguistique = new ArrayCollection();
        $this->projet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNni(): ?int
    {
        return $this->nni;
    }

    public function setNni(int $nni): self
    {
        $this->nni = $nni;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMatricule(): ?int
    {
        return $this->matricule;
    }

    public function setMatricule(int $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateRecrutement(): ?\DateTimeInterface
    {
        return $this->date_recrutement;
    }

    public function setDateRecrutement(\DateTimeInterface $date_recrutement): self
    {
        $this->date_recrutement = $date_recrutement;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * @return Collection<int, Diplome>
     */
    public function getDiplome(): Collection
    {
        return $this->Diplome;
    }

    public function addDiplome(Diplome $diplome): self
    {
        if (!$this->Diplome->contains($diplome)) {
            $this->Diplome[] = $diplome;
            $diplome->setEmploye($this);
        }

        return $this;
    }

    public function removeDiplome(Diplome $diplome): self
    {
        if ($this->Diplome->removeElement($diplome)) {
            // set the owning side to null (unless already changed)
            if ($diplome->getEmploye() === $this) {
                $diplome->setEmploye(null);
            }
        }

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, experience>
     */
    public function getExperience(): Collection
    {
        return $this->experience;
    }

    public function addExperience(experience $experience): self
    {
        if (!$this->experience->contains($experience)) {
            $this->experience[] = $experience;
            $experience->setEmploye($this);
        }

        return $this;
    }

    public function removeExperience(experience $experience): self
    {
        if ($this->experience->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getEmploye() === $this) {
                $experience->setEmploye(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, competence>
     */
    public function getCompetence(): Collection
    {
        return $this->competence;
    }

    public function addCompetence(competence $competence): self
    {
        if (!$this->competence->contains($competence)) {
            $this->competence[] = $competence;
        }

        return $this;
    }

    public function removeCompetence(competence $competence): self
    {
        $this->competence->removeElement($competence);

        return $this;
    }

    /**
     * @return Collection<int, competenceLinguistique>
     */
    public function getCompetenceLinguistique(): Collection
    {
        return $this->competence_linguistique;
    }

    public function addCompetenceLinguistique(competenceLinguistique $competenceLinguistique): self
    {
        if (!$this->competence_linguistique->contains($competenceLinguistique)) {
            $this->competence_linguistique[] = $competenceLinguistique;
        }

        return $this;
    }

    public function removeCompetenceLinguistique(competenceLinguistique $competenceLinguistique): self
    {
        $this->competence_linguistique->removeElement($competenceLinguistique);

        return $this;
    }

    /**
     * @return Collection<int, projet>
     */
    public function getProjet(): Collection
    {
        return $this->projet;
    }

    public function addProjet(projet $projet): self
    {
        if (!$this->projet->contains($projet)) {
            $this->projet[] = $projet;
        }

        return $this;
    }

    public function removeProjet(projet $projet): self
    {
        $this->projet->removeElement($projet);

        return $this;
    }

    public function getRole(): ?role
    {
        return $this->role;
    }

    public function setRole(?role $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getDivision(): ?division
    {
        return $this->division;
    }

    public function setDivision(?division $division): self
    {
        $this->division = $division;

        return $this;
    }
}
