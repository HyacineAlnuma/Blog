<?php

namespace App\Controllers\Post;

use App\Entity\Database;
use App\Repository\PostRepository;
use App\Controllers\Controller;

class DeletePostController extends Controller
{
    private PostRepository $postRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
        $connection = new Database();
        $this->postRepository = new PostRepository();
        $this->postRepository->connection = $connection;
    }

    public function execute($id)
    {
        $this->postRepository->deletePost($id);

        header("Location: index.php?action=posts");
    }
}
