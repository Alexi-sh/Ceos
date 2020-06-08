<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_matiere;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $nom_matiere;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_enseignant;

    /**
     * @ORM\OneToMany(targetEntity=Cours::class, mappedBy="id_matiere")
     */
    private $cours_matiere;

    /**
     * @ORM\OneToMany(targetEntity=Devoir::class, mappedBy="id_matiere", orphanRemoval=true)
     */
    private $devoirs;

    public function __construct()
    {
        $this->cours_matiere = new ArrayCollection();
        $this->devoirs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMatiere(): ?int
    {
        return $this->id_matiere;
    }

    public function setIdMatiere(int $id_matiere): self
    {
        $this->id_matiere = $id_matiere;

        return $this;
    }

    public function getNomMatiere(): ?string
    {
        return $this->nom_matiere;
    }

    public function setNomMatiere(string $nom_matiere): self
    {
        $this->nom_matiere = $nom_matiere;

        return $this;
    }

    public function getIdEnseignant(): ?int
    {
        return $this->id_enseignant;
    }

    public function setIdEnseignant(int $id_enseignant): self
    {
        $this->id_enseignant = $id_enseignant;

        return $this;
    }

    /**
     * @return Collection|Cours[]
     */
    public function getTest(): Collection
    {
        return $this->cours_matiere;
    }

    public function addTest(Cours $cours_matiere): self
    {
        if (!$this->cours_matiere->contains($cours_matiere)) {
            $this->cours_matiere[] = $cours_matiere;
            $cours_matiere->setIdMatiere($this);
        }

        return $this;
    }

    public function removeTest(Cours $cours_matiere): self
    {
        if ($this->cours_matiere->contains($cours_matiere)) {
            $this->cours_matiere->removeElement($cours_matiere);
            // set the owning side to null (unless already changed)
            if ($cours_matiere->getIdMatiere() === $this) {
                $cours_matiere->setIdMatiere(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Devoir[]
     */
    public function getDevoirs(): Collection
    {
        return $this->devoirs;
    }

    public function addDevoir(Devoir $devoir): self
    {
        if (!$this->devoirs->contains($devoir)) {
            $this->devoirs[] = $devoir;
            $devoir->setIdMatiere($this);
        }

        return $this;
    }

    public function removeDevoir(Devoir $devoir): self
    {
        if ($this->devoirs->contains($devoir)) {
            $this->devoirs->removeElement($devoir);
            // set the owning side to null (unless already changed)
            if ($devoir->getIdMatiere() === $this) {
                $devoir->setIdMatiere(null);
            }
        }

        return $this;
    }
}
