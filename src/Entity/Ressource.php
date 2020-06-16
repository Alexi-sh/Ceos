<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use App\Repository\RessourceRepository;

/**
 * @ORM\Entity(repositoryClass=RessourceRepository::class)
 */
class Ressource
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string", columnDefinition="ENUM('Cours', 'Devoir')"))
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     *@ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createAt;

    /**
     * @ORM\Column(type="date")
     */
    private $datelimite;

    /**
     * @ORM\Column(type="integer")
     */
    private $prof;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matiere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getDateLimite(): ?\DateTimeInterface
    {
        return $this->datelimite;
    }

    public function setDateLimite(\DateTimeInterface $datelimite): self
    {
        $this->datelimite = $datelimite;

        return $this;
    }

    public function getProf(): ?int
    {
        return $this->prof;
    }

    public function setProf(int $prof): self
    {
        $this->prof = $prof;

        return $this;
    }

    public function getMatiere(): ?string
    {
        return $this->matiere;
    }

    public function setMatiere(string $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }
}
