<?php

namespace App\Controllers\Post;

class UpdatePostController extends AbstractPostController
{
    public function execute(int $id)
    {
        $errors = [];
        if ($_POST) {
            if ($_POST['title'] !== '' && $_POST['chapo'] !== '' && $_POST['content'] !== '') {
                $this->postRepository->updatePost($id, $_POST);

                header("Location: /post/$id");
            } else {
                $errors[] = 'Les champs ne sont pas correctement remplis.';
            }
        }
        $post = $this->postRepository->getPost($id);
        $this->display('pages/updatePost/index.html.twig', [
            'id' => $id,
            'post' => $post,
            'errors' => $errors
        ]);
    }
}
