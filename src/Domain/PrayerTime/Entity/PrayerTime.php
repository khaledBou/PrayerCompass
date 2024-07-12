<?php

namespace App\Domain\PrayerTime\Entity;

use App\Domain\PrayerTime\Repository\PrayerTimeRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity(repositoryClass: PrayerTimeRepository::class)]
#[ORM\Table(name: 'prayer_times')]
class PrayerTime
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $location;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $fajr;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $dhuhr;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $asr;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $maghrib;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $isha;

    public function __construct(
        string $location,
        DateTimeInterface $fajr,
        DateTimeInterface $dhuhr,
        DateTimeInterface $asr,
        DateTimeInterface $maghrib,
        DateTimeInterface $isha
    ) {
        $this->location = $location;
        $this->fajr = $fajr;
        $this->dhuhr = $dhuhr;
        $this->asr = $asr;
        $this->maghrib = $maghrib;
        $this->isha = $isha;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getFajr(): DateTimeInterface
    {
        return $this->fajr;
    }

    public function setFajr(DateTimeInterface $fajr): void
    {
        $this->fajr = $fajr;
    }

    public function getDhuhr(): DateTimeInterface
    {
        return $this->dhuhr;
    }

    public function setDhuhr(DateTimeInterface $dhuhr): void
    {
        $this->dhuhr = $dhuhr;
    }

    public function getAsr(): DateTimeInterface
    {
        return $this->asr;
    }

    public function setAsr(DateTimeInterface $asr): void
    {
        $this->asr = $asr;
    }

    public function getMaghrib(): DateTimeInterface
    {
        return $this->maghrib;
    }

    public function setMaghrib(DateTimeInterface $maghrib): void
    {
        $this->maghrib = $maghrib;
    }

    public function getIsha(): DateTimeInterface
    {
        return $this->isha;
    }

    public function setIsha(DateTimeInterface $isha): void
    {
        $this->isha = $isha;
    }


}
