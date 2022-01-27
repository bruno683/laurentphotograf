<?php

namespace App\Controller;

use App\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    #[Route('/portfolio', name: 'portfolio')]
    public function index(): Response
    {
        $photo = new Products();
        if ($photo->getPortfolio()) {
        }
        return $this->render('portfolio/index.html.twig', []);
    }
}
