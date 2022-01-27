<?php

namespace App\Controller;

use App\Entity\Products;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    #[Route('/portfolio', name: 'portfolio')]
    public function index(ProductsRepository $productRepo, Products $photo): Response
    {


        return $this->render('portfolio/index.html.twig', [
            'title' => 'Portfolio',

        ]);
    }
}
