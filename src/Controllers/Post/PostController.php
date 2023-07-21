<?php

namespace App\Controllers\Post;

use App\Entity\Database;
use App\Repository\PostRepository;
use App\Repository\CommentRepository;
use App\Controllers\Controller;

class PostController extends Controller
{
    private PostRepository $postRepository;
    private CommentRepository $commentRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
        $connection = new Database();
        $this->postRepository = new PostRepository();
        $this->postRepository->connection = $connection;
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
