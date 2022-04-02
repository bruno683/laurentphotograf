<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/post', name: 'post')]
    public function index(PostRepository $postRepo): Response
    {

        $article = new Post();
        $posts = $postRepo->findPostPublished($article);

        return $this->render('post/index.html.twig', [
            'title' => 'Actualités',
            'posts' => $posts
        ]);
    }

    #[Route('/post/{id}', name: 'show_post')]
    public function displayPost(Post $post)
    {
        return $this->render('post/show.html.twig', [

            'post' => $post,
        ]);
    }
}
