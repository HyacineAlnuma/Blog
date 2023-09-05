<?php

namespace App\Controllers\Post;

class DeletePostController extends AbstractPostController
{
    public function execute(int $id)
    {
        if ($_SESSION['user'] == null || $_SESSION['user']->getUserRole() == 'user') {
            header("Location: /posts");
        } else {
            $this->postRepository->deletePost($id);

            header("Location: /posts");
        }
    }
}
