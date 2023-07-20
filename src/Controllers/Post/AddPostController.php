<?php

namespace App\Controllers\Post;

use App\Entity\Database;
use App\Repository\PostRepository;
use App\Controllers\Controller;

class AddPostController extends Controller
{
    public function execute($inputs)
    {
        $connection = new Database();

        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $postRepository->addPost($inputs);

        header("Location: index.php?action=posts");
    }
}
