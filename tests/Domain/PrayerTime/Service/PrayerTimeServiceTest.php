<?php

namespace App\Tests\Domain\PrayerTime\Service;

use App\Domain\PrayerTime\Repository\PrayerTimeRepository;
use App\Domain\PrayerTime\Service\PrayerTimeService;
use PHPUnit\Framework\TestCase;

class PrayerTimeServiceTest extends TestCase
{
    public function testGetPrayerTimes()
    {
        $repository = $this->createMock(PrayerTimeRepository::class);
        $service = new PrayerTimeService($repository);

        $location = 'Paris';
        $repository->expects($this->once())
            ->method('findOneBy')
            ->with(['location' => $location])
            ->willReturn(null);

        $result = $service->getPrayerTimes($location);

        $this->assertNull($result);
    }
}