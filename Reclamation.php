<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReclamationRepository::class)
 */
class Reclamation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_rec;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_rec;

    /**
     * @ORM\Column(type="date")
     */
    private $date_rec;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeRec(): ?string
    {
        return $this->type_rec;
    }

    public function setTypeRec(string $type_rec): self
    {
        $this->type_rec = $type_rec;

        return $this;
    }

    public function getDescriptionRec(): ?string
    {
        return $this->description_rec;
    }

    public function setDescriptionRec(string $description_rec): self
    {
        $this->description_rec = $description_rec;

        return $this;
    }

    public function getDateRec(): ?\DateTimeInterface
    {
        return $this->date_rec;
    }

    public function setDateRec(\DateTimeInterface $date_rec): self
    {
        $this->date_rec = $date_rec;

        return $this;
    }
}
