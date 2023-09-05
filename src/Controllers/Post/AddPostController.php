<?php

namespace App\Controllers\Post;

class AddPostController extends AbstractPostController
{
    public function execute()
    {
        if ($_SESSION['user'] == null || $_SESSION['user']->getUserRole() == 'user') {
            header("Location: /posts");
        } else {
            $errors = [];
            if ($_POST) {
                if ($_POST['title'] !== '' && $_POST['chapo'] !== '' && $_POST['content'] !== '') {
                    $this->postRepository->addPost($_POST);

                    header("Location: /posts");
                } else {
                    $errors[] = 'Les champs ne sont pas correctement remplis.';
                }
            }
            $this->display('pages/addPost/index.html.twig', [
                'errors' => $errors
            ]);
        }
    }
}
