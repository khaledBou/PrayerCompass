<?php

namespace App\Infrastructure\API\Controller;

use App\Domain\QiblaDirection\Service\QiblaDirectionService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class QiblaDirectionController
{
    private QiblaDirectionService $qiblaDirectionService;

    public function __construct(QiblaDirectionService $qiblaDirectionService)
    {
        $this->qiblaDirectionService = $qiblaDirectionService;
    }

    #[Route('/api/qibla-direction/{location}', name: 'get_qibla_direction', methods: ['GET'])]
    public function getQiblaDirection(string $location): JsonResponse
    {
        $direction = $this->qiblaDirectionService->calculateQiblaDirection($location);

        return new JsonResponse(['location' => $location, 'direction' => $direction]);
    }

    #[Route('/api/qibla-direction', name: 'save_qibla_direction', methods: ['POST'])]
    public function saveQiblaDirection(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['location'], $data['direction'])) {
            return new JsonResponse(['error' => 'Invalid data'], 400);
        }

        $qiblaDirection = $this->qiblaDirectionService->saveQiblaDirection(
            $data['location'],
            (float)$data['direction']
        );

        return new JsonResponse($qiblaDirection, 201);
    }
}