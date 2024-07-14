<?php

namespace App\Infrastructure\API\Controller;

use App\Domain\PrayerTime\Entity\PrayerTime;
use App\Domain\PrayerTime\Repository\PrayerTimeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/prayer-time')]
class PrayerTimeController extends AbstractController
{
    private $prayerTimeRepository;

    public function __construct(PrayerTimeRepository $prayerTimeRepository)
    {
        $this->prayerTimeRepository = $prayerTimeRepository;
    }

    #[Route('', name: 'get_prayer_times', methods: ['GET'])]
    public function getPrayerTimes(): Response
    {
        $prayerTimes = $this->prayerTimeRepository->findAll();
        return $this->json($prayerTimes);
    }

    /**
     * @throws \Exception
     */
    #[Route('', name: 'add_prayer_time', methods: ['POST'])]
    public function addPrayerTime(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $prayerTime = new PrayerTime();
        $prayerTime->setCity($data['city']);
        $prayerTime->setCountry($data['country']);
        
        $prayerTime->setFajr(new \DateTime($data['fajr']));
        $prayerTime->setDhuhr(new \DateTime($data['dhuhr']));
        $prayerTime->setAsr(new \DateTime($data['asr']));
        $prayerTime->setMaghrib(new \DateTime($data['maghrib']));
        $prayerTime->setIsha(new \DateTime($data['isha']));

        $this->prayerTimeRepository->save($prayerTime, true);

        return $this->json($prayerTime, Response::HTTP_CREATED);
    }
}