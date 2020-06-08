<?php

namespace App\Entity;

use App\Repository\DevoirRenduRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DevoirRenduRepository::class)
 */
class DevoirRendu
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
    private $id_devoir_rendu;

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
     * @ORM\Column(type="integer")
     */
    private $id_devoir;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_eleve;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDevoirRendu(): ?int
    {
        return $this->id_devoir_rendu;
    }

    public function setIdDevoirRendu(int $id_devoir_rendu): self
    {
        $this->id_devoir_rendu = $id_devoir_rendu;

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

    public function getIdDevoir(): ?int
    {
        return $this->id_devoir;
    }

    public function setIdDevoir(int $id_devoir): self
    {
        $this->id_devoir = $id_devoir;

        return $this;
    }

    public function getIdEleve(): ?int
    {
        return $this->id_eleve;
    }

    public function setIdEleve(int $id_eleve): self
    {
        $this->id_eleve = $id_eleve;

        return $this;
    }
}
