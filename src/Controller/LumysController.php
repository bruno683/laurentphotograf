<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LumysController extends AbstractController
{
    #[Route('/lumys', name: 'app_lumys')]
    public function index(): Response
    {
        return $this->render('lumys/index.html.twig', [
            'controller_name' => 'LumysController',
        ]);
    }
}
