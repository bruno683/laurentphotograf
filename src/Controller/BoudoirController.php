<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoudoirController extends AbstractController
{
    #[Route('/boudoir', name: 'app_boudoir')]
    public function index(): Response
    {
        return $this->render('boudoir/index.html.twig', [
            'controller_name' => 'BoudoirController',
        ]);
    }
}
