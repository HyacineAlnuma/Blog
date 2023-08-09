<?php

namespace App\Controllers\Post;

class DeletePostController extends AbstractPostController
{
    public function execute(int $id)
    {
        $this->postRepository->deletePost($id);

        header("Location: /posts");
    }
}
