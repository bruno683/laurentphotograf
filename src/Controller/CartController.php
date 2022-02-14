<?php

namespace App\Controller;

use SessionHandlerInterface;
use App\Repository\TiragesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'cart')]
    public function index(Request $request, TiragesRepository $tirageRepo)
    {
        $session = $request->getSession();
        $cart = $session->get('panier', []);

        $cartWidthData = [];

        foreach ($cart as $id => $quantity) {
            $cartWidthData[] = [
                'produit' => $tirageRepo->find($id),
                'quantité' => $quantity
            ];
        }
        $total = 0;
        $totalAmount = 0;

        foreach ($cartWidthData as $item) {
           $totalItems = $item['quantité'];
           $totalAmount += $totalItems;
        }

        foreach ($cartWidthData as $item) {
            $totalItems = $item['produit']->getPrix() * $item['quantité'];
            $total += $totalItems;
        }

        return $this->render('cart/index.html.twig', [
            'total' => $total,
            'items' => $cartWidthData,
            'totalAmount' => $totalAmount
        ]);
    }

    #[Route('/cart/add/{id}', name: 'cart_add')]
    public function add(int $id, Request $request): Response
    {
        $session = $request->getSession();
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }
       $session->set('panier', $panier);
        return $this->json([
            'code' => 200,
            'quantité' => $panier[$id]
        ]);
       //return $this->redirectToRoute('cart');
    }

    #[Route('/cart/remove/{id}', name: 'cart_remove')]
    public function removeItem(int $id, Request $request ): Response
    {
        $session = $request->getSession();
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id]--;
        } 
        if (empty($panier[$id])) {
            unset($panier[$id]);
        };

        $session->set('panier', $panier);  
        return $this->json([
            'code' => 200,
            'quantité' => $panier[$id]
        ]);

        //return $this->redirectToRoute('cart');
       
    }

    #[Route('/cart/delete/{id}', name: 'cart_delete')]
    public function deleteInCart(int $id, Request $request): Response
    {
        $session = $request->getSession();
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id]--;
        }

        if (empty($panier[$id])) {
            unset($panier[$id]);
        };

        $session->set('panier', $panier);

        return $this->redirectToRoute('cart');
    }
}
