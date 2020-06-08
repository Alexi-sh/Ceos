<?php

namespace App\Entity;

use App\Repository\JoinEtudMatiereRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JoinEtudMatiereRepository::class)
 */
class JoinEtudMatiere
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
    private $id_eleve;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_matiere;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdMatiere(): ?int
    {
        return $this->id_matiere;
    }

    public function setIdMatiere(int $id_matiere): self
    {
        $this->id_matiere = $id_matiere;

        return $this;
    }
}
