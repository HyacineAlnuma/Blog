<?php

namespace App\Controllers\Post;

class AddPostController extends AbstractPostController
{
    public function execute()
    {
        if (isset($_POST) && $_POST !== '') {
            //vérifier tous les inputs
            $this->postRepository->addPost();

            header("Location: index.php?action=posts");
        }
        $this->twig->display('addPost/index.html.twig');
    }
}
