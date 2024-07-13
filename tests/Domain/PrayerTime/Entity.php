<?php

namespace App\Tests\Domain\PrayerTime;

use App\Domain\PrayerTime\Entity\PrayerTime;
use PHPUnit\Framework\TestCase;

class PrayerTimeTest extends TestCase
{
    public function testPrayerTimeEntity()
    {
        $prayerTime = new PrayerTime();
        $prayerTime->setCity('Mecca');
        $prayerTime->setCountry('Saudi Arabia');
        $prayerTime->setFajr(new \DateTime('2023-07-13 04:30:00'));
        $prayerTime->setDhuhr(new \DateTime('2023-07-13 12:30:00'));
        $prayerTime->setAsr(new \DateTime('2023-07-13 15:30:00'));
        $prayerTime->setMaghrib(new \DateTime('2023-07-13 18:45:00'));
        $prayerTime->setIsha(new \DateTime('2023-07-13 20:00:00'));

        $this->assertEquals('Mecca', $prayerTime->getCity());
        $this->assertEquals('Saudi Arabia', $prayerTime->getCountry());
        $this->assertEquals('2023-07-13 04:30:00', $prayerTime->getFajr()->format('Y-m-d H:i:s'));
        $this->assertEquals('2023-07-13 12:30:00', $prayerTime->getDhuhr()->format('Y-m-d H:i:s'));
        $this->assertEquals('2023-07-13 15:30:00', $prayerTime->getAsr()->format('Y-m-d H:i:s'));
        $this->assertEquals('2023-07-13 18:45:00', $prayerTime->getMaghrib()->format('Y-m-d H:i:s'));
        $this->assertEquals('2023-07-13 20:00:00', $prayerTime->getIsha()->format('Y-m-d H:i:s'));
    }
}