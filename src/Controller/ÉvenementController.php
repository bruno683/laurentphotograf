<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class √ČvenementController extends AbstractController
{
    #[Route('/evenement', name: 'app__evenement')]
    public function index(): Response
    {
        return $this->render('√Čvenement/index.html.twig', [
            'controller_name' => '√ČvenementController',
        ]);
    }
}
