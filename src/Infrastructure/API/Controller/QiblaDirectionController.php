<?php

namespace App\Infrastructure\API\Controller;

use App\Domain\QiblaDirection\Service\QiblaDirectionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/qibla-direction')]
class QiblaDirectionController extends AbstractController
{
    private $qiblaDirectionService;

    public function __construct(QiblaDirectionService $qiblaDirectionService)
    {
        $this->qiblaDirectionService = $qiblaDirectionService;
    }

    #[Route('', name: 'get_qibla_direction', methods: ['POST'])]
    public function getQiblaDirection(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $latitude = $data['latitude'];
        $longitude = $data['longitude'];

        $qiblaDirection = $this->qiblaDirectionService->calculateQiblaDirection($latitude, $longitude);

        return $this->json(['direction' => $qiblaDirection]);
    }
}