<?php

namespace App\Entity;

use App\Repository\ProfesseurPrincipalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfesseurPrincipalRepository::class)
 */
class ProfesseurPrincipal
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
    private $id_prof_principal;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_enseignant;

    public function getId(): ?int
    {
        return $this->id;
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
