<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_service = null;

    #[ORM\Column(length: 255)]
    private ?string $description_service = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameService(): ?string
    {
        return $this->name_service;
    }

    public function setNameService(string $name_service): static
    {
        $this->name_service = $name_service;

        return $this;
    }

    public function getDescriptionService(): ?string
    {
        return $this->description_service;
    }

    public function setDescriptionService(string $description_service): static
    {
        $this->description_service = $description_service;

        return $this;
    }
}
