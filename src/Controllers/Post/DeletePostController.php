<?php

namespace App\Controllers\Post;

use App\Entity\Database;
use App\Repository\PostRepository;
use App\Controllers\Controller;

class DeletePostController extends Controller
{
    public function execute($id)
    {
        $connection = new Database();

        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $postRepository->deletePost($id);

        header("Location: index.php?action=posts");
    }
}
