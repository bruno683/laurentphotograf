<?php

namespace App\Controller;

use App\Entity\Customers;
use App\Form\CustomerType;
use App\Repository\CustomersRepository;
use App\Repository\TiragesRepository;
use Doctrine\Persistence\ManagerRegistry;
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
    public function newCustomer(Request $request, ManagerRegistry $doctrine)
    {
        $customer = new Customers();
        $session = $request->getSession();
        $cart = $session->get('panier', []);
        $entityManager = $doctrine->getManager();
        $form = $this->createForm(CustomerType::class, $customer);

        if ($form->isSubmitted() && $form->isValid()) {
            $customer->setCommande($cart);
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            //$customer = $form->getData();
            $entityManager->persist($customer);
            $entityManager->flush();

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('customer_success');
        }

        return $this->renderForm('customer/index.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/customer/show/{id}', name: 'customer_show')]
    public function showCustomer(int $id, CustomersRepository $customerRepo)
    {
        $customer = $customerRepo->findBy($id);

        return $this->render('customer/show.html.twig', [
            'customer' => $customer
        ]);
    }
}
