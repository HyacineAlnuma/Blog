<?php

namespace App\Controllers\Post;

class AddPostController extends AbstractPostController
{
    public function execute()
    {
        $errors = [];
        if ($_POST) {
            if ($_POST['title'] !== '' && $_POST['chapo'] !== '' && $_POST['content'] !== '') {
                $this->postRepository->addPost($_POST);

                header("Location: index.php?action=posts");
            } else {
                $errors[] = 'Les champs ne sont pas correctement remplis';
            }
        }
        $this->twig->display('pages/addPost/index.html.twig', [
            'errors' => $errors
        ]);
    }
}
