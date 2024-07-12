<?php

namespace App\Infrastructure\API\Controller;

use App\Domain\PrayerTime\Service\PrayerTimeService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PrayerTimeController
{
    private PrayerTimeService $prayerTimeService;

    public function __construct(PrayerTimeService $prayerTimeService)
    {
        $this->prayerTimeService = $prayerTimeService;
    }

    #[Route('/api/prayer-times/{location}', name: 'get_prayer_times', methods: ['GET'])]
    public function getPrayerTimes(string $location): JsonResponse
    {
        $prayerTimes = $this->prayerTimeService->getPrayerTimes($location);
        if ($prayerTimes === null) {
            return new JsonResponse(['error' => 'Prayer times not found'], 404);
        }

        return new JsonResponse($prayerTimes);
    }

    #[Route('/api/prayer-times', name: 'save_prayer_times', methods: ['POST'])]
    public function savePrayerTimes(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['location'], $data['fajr'], $data['dhuhr'], $data['asr'], $data['maghrib'], $data['isha'])) {
            return new JsonResponse(['error' => 'Invalid data'], 400);
        }

        $prayerTime = $this->prayerTimeService->savePrayerTime(
            $data['location'],
            new \DateTime($data['fajr']),
            new \DateTime($data['dhuhr']),
            new \DateTime($data['asr']),
            new \DateTime($data['maghrib']),
            new \DateTime($data['isha'])
        );

        return new JsonResponse($prayerTime, 201);
    }
}