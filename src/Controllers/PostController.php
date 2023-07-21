<?php

namespace App\Controllers;

use App\Entity\Database;
use App\Repository\PostRepository;

class PostController extends Controller
{
    private PostRepository $postRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
        $connection = new Database();
        $this->postRepository = new PostRepository();
        $this->postRepository->connection = $connection;
    }

    public function execute(int $id)
    {
        $post = $this->postRepository->getPost($id);

        $this->twig->display('post/index.html.twig', [
            'post' => $post
        ]);
    }
}
