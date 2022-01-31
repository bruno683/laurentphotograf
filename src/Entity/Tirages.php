<?php

namespace App\Entity;

use App\Repository\TiragesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TiragesRepository::class)]
class Tirages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $format;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $prix;

    #[ORM\ManyToOne(targetEntity: Products::class, inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private $Photo;

    #[ORM\Column(type: 'boolean')]
    private $enVente;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $quantité;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPhoto(): ?Products
    {
        return $this->Photo;
    }

    public function setPhoto(?Products $Photo): self
    {
        $this->Photo = $Photo;

        return $this;
    }

    public function getEnVente(): ?bool
    {
        return $this->enVente;
    }

    public function setEnVente(bool $enVente): self
    {
        $this->enVente = $enVente;

        return $this;
    }

    public function getQuantité(): ?int
    {
        return $this->quantité;
    }

    public function setQuantité(?int $quantité): self
    {
        $this->quantité = $quantité;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
