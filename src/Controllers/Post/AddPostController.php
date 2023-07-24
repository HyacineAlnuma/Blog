<?php

namespace App\Controllers\Post;

use App\Entity\Database;
use App\Repository\PostRepository;
use App\Controllers\Controller;

class AddPostController extends Controller
{
    private PostRepository $postRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
        $connection = new Database();
        $this->postRepository = new PostRepository();
        $this->postRepository->connection = $connection;
    }

    public function execute($inputs)
    {
        $this->postRepository->addPost($inputs);

        header("Location: index.php?action=posts");
    }

    public function render()
    {
        $this->twig->display('addPost/index.html.twig');
    }
}
