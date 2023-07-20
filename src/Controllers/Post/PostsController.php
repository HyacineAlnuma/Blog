<?php

namespace App\Controllers\Post;

use App\Entity\Database;
use App\Repository\PostRepository;
use App\Controllers\Controller;

class PostsController extends Controller
{
    public function execute()
    {
        $connection = new Database();

        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $posts = $postRepository->getPosts();

        $this->twig->display('posts/index.html.twig', [
            'posts' => $posts
        ]);
    }
}
