<?php

namespace App\Controllers;

use App\Entity\Database;
use App\Repository\PostRepository;

class PostController extends Controller
{
    public function execute(string $id)
    {
        $connection = new Database();

        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $post = $postRepository->getPost($id);

        $this->twig->display('post/index.html.twig', [
            'post' => $post
        ]);
    }
}
