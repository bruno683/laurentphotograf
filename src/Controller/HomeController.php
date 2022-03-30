<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{



    #[Route('/', name: 'home')]
    public function index(PostRepository $postRepository): Response
    {
        //j'instancie un nouvel article
        $article = new Post();
        // Je cherche tous les articles
        $posts = $postRepository->findPostPublished($article);
        $listPost[] = [];
        // Dans une boucle je parcours le tableau
        for ($i = 0; $i < 5; $i++) {
            if ($posts) {
                $listPost[] += $posts[$i];
                return $listPost;
            } else {
                return false;
            }
        }
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Accueil',
            'posts' => $listPost
        ]);
    }
}
