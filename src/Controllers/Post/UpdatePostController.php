<?php

namespace App\Controllers\Post;

use App\Entity\Database;
use App\Repository\PostRepository;
use App\Controllers\Controller;

class UpdatePostController extends Controller
{
    private PostRepository $postRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
        $connection = new Database();
        $this->postRepository = new PostRepository();
        $this->postRepository->connection = $connection;
    }

    public function execute($id, $inputs)
    {
        $this->postRepository->updatePost($id, $inputs);

        header("Location: index.php?action=post&id=$id");
    }
}
