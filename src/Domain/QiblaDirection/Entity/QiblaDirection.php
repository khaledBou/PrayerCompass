<?php

namespace App\Domain\QiblaDirection\Entity;

use App\Domain\QiblaDirection\Repository\QiblaDirectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QiblaDirectionRepository::class)]
#[ORM\Table(name: 'qibla_directions')]
class QiblaDirection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $location;

    #[ORM\Column(type: 'float')]
    private float $direction;

    public function __construct(string $location, float $direction)
    {
        $this->location = $location;
        $this->direction = $direction;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getDirection(): float
    {
        return $this->direction;
    }

    public function setDirection(float $direction): void
    {
        $this->direction = $direction;
    }

}
