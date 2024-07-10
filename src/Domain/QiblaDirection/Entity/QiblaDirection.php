<?php

namespace App\Domain\QiblaDirection\Entity;

use App\Domain\QiblaDirection\Repository\QiblaDirectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QiblaDirectionRepository::class)]
class QiblaDirection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column]
    private ?float $direction = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getDirection(): ?float
    {
        return $this->direction;
    }

    public function setDirection(float $direction): static
    {
        $this->direction = $direction;

        return $this;
    }
}
