<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'mailer')]
    public function index(MailerInterface $mailerInterface): Response
    {
        $email = (new Email())
            ->from('bruno683@outlook.fr')
            ->to('brunorichard683@outlook.fr')
            ->subject('This e-mail is for testing purpose')
            ->text('This is the text version')
            ->html('<p>This is the HTML version</p>');

        $mailerInterface->send($email);


        return $this->render('mailer/index.html.twig', [
            'controller_name' => 'MailerController',
        ]);
    }
}
