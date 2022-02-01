<?php

namespace App\Controller;

use App\Entity\Customers;
use App\Form\CustomerType;
use App\Repository\TiragesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    #[Route('/customer', name: 'customer')]
    public function index(Request $request, TiragesRepository $tirageRepo): Response
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

        foreach ($cartWidthData as $item) {
            $totalItems = $item['produit']->getPrix() * $item['quantité'];
            $total += $totalItems;
        }


        return $this->render('customer/index.html.twig', [
           
        ]);
    }

    #[Route('/customer/new', name: 'customer_new')]
    public function newCustomer(Request $request)
    {
        $customer = new Customers();

        $form = $this->createForm(CustomerType::class, $customer);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $customer = $form->getData();

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('customer_success');
        }

        return $this->renderForm('customer/index.html.twig', [
            'form' => $form
        ]);
    }
}
