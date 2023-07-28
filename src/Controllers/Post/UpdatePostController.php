<?php

namespace App\Controllers\Post;

class UpdatePostController extends AbstractPostController
{
    public function execute($id, $inputs)
    {
        $post = $this->postRepository->getPost($id);
        $this->postRepository->updatePost($id, $inputs);

        header("Location: index.php?action=post&id=$id");
    }

    public function render($id)
    {
        $post = $this->postRepository->getPost($id);
        $this->twig->display('updatePost/index.html.twig', [
            'id' => $id,
            'post' => $post
        ]);
    }
}
