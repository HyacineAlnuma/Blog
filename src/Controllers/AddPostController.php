<?php

namespace App\Controllers;

use App\Entity\Database;
use App\Repository\PostRepository;

class AddPostController extends Controller
{
    public function execute($inputs)
    {
        $connection = new Database();

        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $postRepository->addPost($inputs);

        $this->twig->display('addPost/index.html.twig');
    }
}
