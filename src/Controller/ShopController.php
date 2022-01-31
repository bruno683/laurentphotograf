<?php

namespace App\Controller;

use App\Entity\Products;
use App\Entity\Tirages;
use App\Repository\ProductsRepository;
use App\Repository\TiragesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    #[Route('/shop', name: 'shop')]
    public function index(TiragesRepository $tirageRepo, ProductsRepository $productsRepo): Response
    {
        $title = 'Liste des tirages limités';
        $item = new Tirages();
        $tirages = $tirageRepo->findEnVente($item);


        return $this->render('shop/index.html.twig', [
            'title' => $title,
            'tirages' => $tirages,
        ]);
    }
}
