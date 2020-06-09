<?php

namespace App\Entity;

use App\Repository\DevoirRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DevoirRepository::class)
 */
class Devoir
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
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $lien_telechargement;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class, inversedBy="devoirs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?Matiere $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }
}
