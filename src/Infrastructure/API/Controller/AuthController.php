<?php

namespace App\Infrastructure\API\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Security\User;


#[Route('/api')]
class AuthController extends AbstractController
{
    private $jwtManager;

    private $entityManager;

    public function __construct(JWTTokenManagerInterface $jwtManager, EntityManagerInterface $entityManager)
    {
        $this->jwtManager = $jwtManager;
        $this->entityManager = $entityManager;
    }

    #[Route('/login', name: 'api_login', methods: ['POST'])]
    public function login(Request $request): JsonResponse
    {
        // Récupérer les données JSON de la requête
        $data = json_decode($request->getContent(), true);

        // Récupérer l'utilisateur en fonction des données de connexion (email, mot de passe, etc.)
        // Vous pouvez implémenter votre propre logique pour trouver et valider l'utilisateur ici
        $user = $this->entityManager->getRepository(UserInterface::class)->findOneBy([
            'email' => $data['email']
        ]);

        // Générer un token JWT si l'utilisateur est trouvé et les informations de connexion sont valides
        if (!$user || !password_verify($data['password'], $user->getPassword())) {
            return new JsonResponse(['message' => 'Invalid credentials'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $token = $this->jwtManager->create($user);

        // Retourner une réponse JSON contenant le token
        return new JsonResponse(['token' => $token]);
    }
}