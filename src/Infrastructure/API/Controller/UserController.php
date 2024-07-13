<?php

namespace App\Infrastructure\API\Controller;

use App\Domain\User\Service\UserService;
use App\Infrastructure\Security\TokenService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/api/users')]
class UserController extends AbstractController
{
    private $userService;
    private $tokenService;

    public function __construct(UserService $userService, TokenService $tokenService)
    {
        $this->userService = $userService;
        $this->tokenService = $tokenService;
    }

    #[Route('/register', name: 'register_user', methods: ['POST'])]
    public function registerUser(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $email = $data['email'];
        $password = $data['password'];

        // Créer un nouvel utilisateur
        $user = $this->userService->createUser($email, $password);

        // Générer un token JWT pour l'utilisateur
        $token = $this->tokenService->generateToken($user);

        // Retourner la réponse JSON avec le token et le code de statut HTTP 201 (Created)
        return new JsonResponse(['token' => $token], Response::HTTP_CREATED);
    }
}