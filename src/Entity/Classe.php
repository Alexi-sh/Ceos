<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 */
class Classe
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
    private $id_classe;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $section;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $niveau;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_prof_principal;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_enseignant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClasse(): ?int
    {
        return $this->id_classe;
    }

    public function setIdClasse(int $id_classe): self
    {
        $this->id_classe = $id_classe;

        return $this;
    }

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setSection(string $section): self
    {
        $this->section = $section;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getIdProfPrincipal(): ?int
    {
        return $this->id_prof_principal;
    }

    public function setIdProfPrincipal(int $id_prof_principal): self
    {
        $this->id_prof_principal = $id_prof_principal;

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
}
