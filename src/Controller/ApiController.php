<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

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
}
