<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ÉvenementController extends AbstractController
{
    #[Route('/evenement', name: 'app__evenement')]
    public function index(): Response
    {
        return $this->render('Évenement/index.html.twig', [
            'controller_name' => 'ÉvenementController',
        ]);
    }
}
