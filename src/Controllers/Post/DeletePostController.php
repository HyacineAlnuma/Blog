<?php

namespace App\Controllers\Post;

class DeletePostController extends AbstractPostController
{
    public function execute($id)
    {
        $this->postRepository->deletePost($id);

        header("Location: index.php?action=posts");
    }
}
