<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AquaShootingController extends AbstractController
{
    #[Route('/aqua/shooting', name: 'app_aqua_shooting')]
    public function index(): Response
    {
        return $this->render('aqua_shooting/index.html.twig', [
            'controller_name' => 'AquaShootingController',
        ]);
    }
}
