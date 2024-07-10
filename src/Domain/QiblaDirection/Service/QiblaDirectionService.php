<?php

namespace App\Domain\QiblaDirection\Service;

use App\Domain\QiblaDirection\Entity\QiblaDirection;
use App\Domain\QiblaDirection\Repository\QiblaDirectionRepository;

class QiblaDirectionService
{
    private $qiblaDirectionRepository;

    public function __construct(QiblaDirectionRepository $qiblaDirectionRepository)
    {
        $this->qiblaDirectionRepository = $qiblaDirectionRepository;
    }

    public function calculateQiblaDirection(string $location): float
    {
        // Implémentez le calcul de la direction de la Qibla ici
        return 270.0;
    }

    public function saveQiblaDirection(string $location): QiblaDirection
    {
        $direction = $this->calculateQiblaDirection($location);

        $qiblaDirection = new QiblaDirection();
        $qiblaDirection->setLocation($location);
        $qiblaDirection->setDirection($direction);

        $this->qiblaDirectionRepository->save($qiblaDirection);

        return $qiblaDirection;
    }

}