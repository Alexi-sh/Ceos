<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
class Note
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
    private $id_note;

    /**
     * @ORM\Column(type="integer")
     */
    private $note;

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

    public function getIdNote(): ?int
    {
        return $this->id_note;
    }

    public function setIdNote(int $id_note): self
    {
        $this->id_note = $id_note;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

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
