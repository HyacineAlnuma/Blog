<?php

namespace App\Controllers;

use App\Entity\Database;
use App\Repository\PostRepository;

class UpdatePostController extends Controller
{
    public function execute($id, $inputs)
    {
        $connection = new Database();

        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $postRepository->updatePost($id, $inputs);

        header("Location: index.php?action=posts");
    }
}
