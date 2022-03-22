<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortraitsController extends AbstractController
{
    #[Route('/portraits', name: 'app_portraits')]
    public function index(): Response
    {
        return $this->render('portraits/index.html.twig', [
            'controller_name' => 'PortraitsController',
        ]);
    }
}
