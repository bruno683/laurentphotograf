<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    #[Route('/base', name: 'base' )]
    public function index(): Response
    {
        $secretKey = $_ENV('PAYPAL_SECRET_KEY');
        return $this->render('base.html.twig', [
            'secretKey' => $secretKey,
        ]);
    }
}