<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 */
class Cours
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
    private $id_cours;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lien_telechargement;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class, inversedBy="test")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_matiere;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCours(): ?int
    {
        return $this->id_cours;
    }

    public function setIdCours(int $id_cours): self
    {
        $this->id_cours = $id_cours;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLienTelechargement(): ?string
    {
        return $this->lien_telechargement;
    }

    public function setLienTelechargement(?string $lien_telechargement): self
    {
        $this->lien_telechargement = $lien_telechargement;

        return $this;
    }

    public function getIdMatiere(): ?Matiere
    {
        return $this->id_matiere;
    }

    public function setIdMatiere(?Matiere $id_matiere): self
    {
        $this->id_matiere = $id_matiere;

        return $this;
    }

}
