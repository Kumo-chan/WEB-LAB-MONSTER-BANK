<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MonsterController extends AbstractController
{
    #[Route('/api/monsters', name: 'monsters')]
    public function show()
    {
        // ...
    }
    #[Route('/api/monster/{id}', methods: ['PUT'])]
    public function edit(Request $request): Response
    {
        // ... edit a post
    }
    #[Route('/api/monster/{id}', methods: ['POST'])]
    public function add(Request $request): Response
    {
        // ... edit a post
    }
    #[Route('/api/monster/{id}', methods: ['DELETE'])]
    public function remove(Request $request): Response
    {
        // ... edit a post
    }
}
