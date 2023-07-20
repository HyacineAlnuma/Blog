<?php

namespace App\Controllers\Post;

use App\Entity\Database;
use App\Repository\PostRepository;
use App\Repository\CommentRepository;
use App\Controllers\Controller;

class PostController extends Controller
{
    public function execute(string $id)
    {
        $connection = new Database();

        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $post = $postRepository->getPost($id);

        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;
        $comments = $commentRepository->getComments($id);

        $this->twig->display('post/index.html.twig', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
}
