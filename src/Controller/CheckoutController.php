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
        $shipping = 1700;
        $total = 0;
        $totalAmount = 0;

        foreach($cartWithData as $item){
            $totalItems = $item['quantité'];
            $totalAmount += $totalItems;
        }

        

        foreach ($cartWithData as $item) {
            $totalItems = ($item['produit']->getPrix() * $item['quantité']) ;
            $totalItems +=  ($shipping * $item['quantité']);
            $total += $totalItems;
        }

        $tva = 0.055;
        $newTva = 0;
        foreach ($cartWithData as $item) {
            $tvaIncluded = $item['produit']->getPrix() * $tva;
            $newTva += ($tvaIncluded * $item['quantité']);
        }
        foreach ($cartWithData as $item) {
            # code...
            $totalShipping = ($shipping * $item['quantité']);
        }
        
        
        return $this->render('checkout/index.html.twig', [
            'total' => $total,
            'items' => $cartWithData,
            'totalAmount' => $totalAmount,
            'tvaIncluded' => $newTva,
            'title' => 'Récapitulatif',
            'shipping' => $totalShipping
        ]);
    }
}
