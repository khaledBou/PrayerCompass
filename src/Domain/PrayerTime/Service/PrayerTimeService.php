<?php

namespace App\Domain\PrayerTime\Service;

use App\Domain\PrayerTime\Repository\PrayerTimeRepository;
use App\Domain\PrayerTime\Entity\PrayerTime;
use DateTimeInterface;

class PrayerTimeService
{
    private PrayerTimeRepository $prayerTimeRepository;

    public function __construct(PrayerTimeRepository $prayerTimeRepository)
    {
        $this->prayerTimeRepository = $prayerTimeRepository;
    }

    public function getPrayerTimes(string $location): ?PrayerTime
    {
        // Logique pour obtenir les heures de prière pour une localisation donnée
        return $this->prayerTimeRepository->findOneBy(['location' => $location]);
    }

    public function savePrayerTime(string $location, DateTimeInterface $fajr, DateTimeInterface $dhuhr, DateTimeInterface $asr, DateTimeInterface $maghrib, DateTimeInterface $isha): PrayerTime
    {
        $prayerTime = new PrayerTime($location, $fajr, $dhuhr, $asr, $maghrib, $isha);
        $this->prayerTimeRepository->save($prayerTime);
        return $prayerTime;
    }
}