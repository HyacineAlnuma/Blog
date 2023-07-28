<?php

namespace App\Controllers\Post;

use App\Entity\Database;
use App\Repository\CommentRepository;

class PostController extends AbstractPostController
{
    private CommentRepository $commentRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
        $connection = new Database();
        $this->commentRepository = new CommentRepository();
        $this->commentRepository->connection = $connection;
    }

    public function execute(int $id)
    {
        $post = $this->postRepository->getPost($id);
        $comments = $this->commentRepository->getComments($id);

        $this->twig->display('post/index.html.twig', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
}
