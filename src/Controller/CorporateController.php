<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CorporateController extends AbstractController
{
    #[Route('/corporate', name: 'app_corporate')]
    public function index(): Response
    {
        return $this->render('corporate/index.html.twig', [
            'controller_name' => 'CorporateController',
        ]);
    }
}
