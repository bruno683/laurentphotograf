<?php

namespace App\Controller;

use App\Repository\TiragesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'cart')]
    public function index(Request $request, TiragesRepository $tirageRepo): Response
    {
        $session = $request->getSession();
        $cart = $session->get('panier', []);

        $cartWidthData = [];

        foreach ($cart as $id => $quantity) {
            $cartWidthData[] = [
                'tirage limité' => $tirageRepo->find($id),
                'quantité' => $quantity
            ];
        }

        $total = 0;

        foreach ($cartWidthData as $item) {
            $totalItem = $item['tirage limité']->getPrix() / 100 * $item['quantité'];
            $total += $totalItem;
        }


        return $this->render('cart/index.html.twig', [
            'items' => $cartWidthData,
            'total' => $total
        ]);
    }

    #[Route('/cart/add/{id}', name: 'cart_add')]
    public function add($id, Request $request)
    {
        $session = $request->getSession();
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }


        $session->set('panier', $panier);

        return $this->redirectToRoute('cart');
    }
}
