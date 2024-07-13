<?php

namespace App\Tests\Application\Service;

use App\Domain\QiblaDirection\Service\QiblaDirectionService;
use App\Domain\QiblaDirection\Repository\QiblaDirectionRepository;
use PHPUnit\Framework\TestCase;

class QiblaDirectionServiceTest extends TestCase
{
    public function testCalculateQiblaDirection()
    {
        $qiblaDirectionRepository = $this->createMock(QiblaDirectionRepository::class);
        $service = new QiblaDirectionService($qiblaDirectionRepository);

        $latitude = 21.4225; // Latitude de la Kaaba
        $longitude = 39.8262; // Longitude de la Kaaba

        $direction = $service->calculateQiblaDirection($latitude, $longitude);

        $this->assertIsFloat($direction);
    }
}