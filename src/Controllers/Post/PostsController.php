<?php

namespace App\Controllers\Post;

use App\Entity\Database;
use App\Repository\PostRepository;
use App\Controllers\Controller;

class PostsController extends Controller
{
    private PostRepository $postRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
        $connection = new Database();
        $this->postRepository = new PostRepository();
        $this->postRepository->connection = $connection;
    }

    public function execute()
    {
        $posts = $this->postRepository->getPosts();

        $this->twig->display('posts/index.html.twig', [
            'posts' => $posts
        ]);
    }
}
