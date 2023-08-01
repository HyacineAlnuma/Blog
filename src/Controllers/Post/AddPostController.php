<?php

namespace App\Controllers\Post;

class AddPostController extends AbstractPostController
{
    public function execute()
    {
        if ($_POST) {
            if (
                $_POST['title'] !== ''
                && $_POST['chapo'] !== ''
                && $_POST['content'] !== ''
            ) {
                $this->postRepository->addPost($_POST);

                header("Location: index.php?action=posts");
            } else {
                throw new Exception('Les champs ne sont pas correctement remplis');
            }
        }
        $this->twig->display('addPost/index.html.twig');
    }
}
