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
     * @ORM\Column(type="string", length=40)
     */
    private $nom_matiere;

    /**
     * @ORM\ManyToMany(targetEntity=Enseignant::class, inversedBy="matieres")
     */
    private $enseignant;

    /**
     * @ORM\OneToMany(targetEntity=Devoir::class, mappedBy="matiere")
     */
    private $devoirs;

    public function __construct()
    {
        $this->enseignant = new ArrayCollection();
        $this->devoirs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|Enseignant[]
     */
    public function getEnseignant(): Collection
    {
        return $this->enseignant;
    }

    public function addEnseignant(Enseignant $enseignant): self
    {
        if (!$this->enseignant->contains($enseignant)) {
            $this->enseignant[] = $enseignant;
        }

        return $this;
    }

    public function removeEnseignant(Enseignant $enseignant): self
    {
        if ($this->enseignant->contains($enseignant)) {
            $this->enseignant->removeElement($enseignant);
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
            $devoir->setMatiere($this);
        }

        return $this;
    }

    public function removeDevoir(Devoir $devoir): self
    {
        if ($this->devoirs->contains($devoir)) {
            $this->devoirs->removeElement($devoir);
            // set the owning side to null (unless already changed)
            if ($devoir->getMatiere() === $this) {
                $devoir->setMatiere(null);
            }
        }

        return $this;
    }
}
