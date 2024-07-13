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

    #[ORM\Column(type: 'string', length: 100)]
    private string $city;

    #[ORM\Column(type: 'string', length: 100)]
    private string $country;

    #[ORM\Column(type: 'time')]
    private \DateTimeInterface $fajr;

    #[ORM\Column(type: 'time')]
    private \DateTimeInterface $dhuhr;

    #[ORM\Column(type: 'time')]
    private \DateTimeInterface $asr;

    #[ORM\Column(type: 'time')]
    private \DateTimeInterface $maghrib;

    #[ORM\Column(type: 'time')]
    private \DateTimeInterface $isha;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function getFajr(): \DateTimeInterface
    {
        return $this->fajr;
    }

    public function setFajr(\DateTimeInterface $fajr): self
    {
        $this->fajr = $fajr;
        return $this;
    }

    public function getDhuhr(): \DateTimeInterface
    {
        return $this->dhuhr;
    }

    public function setDhuhr(\DateTimeInterface $dhuhr): self
    {
        $this->dhuhr = $dhuhr;
        return $this;
    }

    public function getAsr(): \DateTimeInterface
    {
        return $this->asr;
    }

    public function setAsr(\DateTimeInterface $asr): self
    {
        $this->asr = $asr;
        return $this;
    }

    public function getMaghrib(): \DateTimeInterface
    {
        return $this->maghrib;
    }

    public function setMaghrib(\DateTimeInterface $maghrib): self
    {
        $this->maghrib = $maghrib;
        return $this;
    }

    public function getIsha(): \DateTimeInterface
    {
        return $this->isha;
    }

    public function setIsha(\DateTimeInterface $isha): self
    {
        $this->isha = $isha;
        return $this;
    }

}
