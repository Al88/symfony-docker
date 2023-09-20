<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends AbstractController
{
    private UserRepository $userRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    #[Route('/api', name: 'app_api')]
    public function index(): JsonResponse
    {

        $users = $this->userRepo->all();
        // var_dump($users);
        return $this->json([
            'users' => $users
        ]);
    }

    #[Route('/api/user', name: 'create_user')]
    public function createUser(UserRepository $userRepo, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $user = new User();
        $user->setName($data["name"]);
        $user->setEmail($data["email"]);

        $userRepo->save($user, true);
        return $this->json([
            'user' => $user
        ]);
    }
}
