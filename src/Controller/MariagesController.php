<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MariagesController extends AbstractController
{
    #[Route('/mariages', name: 'app_mariages')]
    public function index(): Response
    {
        return $this->render('mariages/index.html.twig', [
            'controller_name' => 'MariagesController',
        ]);
    }
}
