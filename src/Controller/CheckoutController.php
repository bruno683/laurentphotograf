<?php

namespace App\Controller;

use App\Repository\TiragesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    #[Route('/checkout', name: 'checkout')]
    public function index(Request $request, TiragesRepository $tirageRepo): Response
    {
        $session = $request->getSession();
        $cart = $session->get('panier', []);

        $cartWithData = [];

        foreach($cart as $id => $quantity){
            $cartWithData[] = [
                'produit' => $tirageRepo->find($id),
                'quantité' =>$quantity
            ];
        }

        $total = 0;
        $totalAmount = 0;

        foreach($cartWithData as $item){
            $totalItems = $item['quantité'];
            $totalAmount += $totalItems;
        }

        foreach ($cartWithData as $item) {
            $totalItems = $item['produit']->getPrix() * $item['quantité'];
            $total += $totalItems;
        }
        return $this->render('checkout/index.html.twig', [
            'total' => $total,
            'items' => $cartWithData,
            'totalAmount' => $totalAmount,
            'title' => 'Récapitulatif'
        ]);
    }
}
