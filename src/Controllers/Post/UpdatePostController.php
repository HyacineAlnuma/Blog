<?php

namespace App\Controllers\Post;

class UpdatePostController extends AbstractPostController
{
    public function execute($id)
    {
        if ($_POST) {
            if (
                $_POST['title'] !== ''
                && $_POST['chapo'] !== ''
                && $_POST['content'] !== ''
            ) {
                $this->postRepository->updatePost($id, $_POST);

                header("Location: index.php?action=post&id=$id");
            } else {
                throw new Exception('Les champs ne sont pas correctement remplis');
            }
        }
        $post = $this->postRepository->getPost($id);
        $this->twig->display('updatePost/index.html.twig', [
            'id' => $id,
            'post' => $post
        ]);
    }
}
