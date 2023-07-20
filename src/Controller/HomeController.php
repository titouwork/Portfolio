<?php

namespace App\Controller;

use App\Repository\ContentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ContentRepository $contentRepo): Response
    {
        return $this->render('home/index.html.twig', [
            'content' => $contentRepo->findAll(),
        ]);
    }
}
