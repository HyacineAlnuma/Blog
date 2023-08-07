<?php

namespace App\Controllers\Post;

class PostsController extends AbstractPostController
{
    public function execute()
    {
        $posts = $this->postRepository->getPosts();

        $this->twig->display('pages/posts/index.html.twig', [
            'loggedIn' => $_SESSION['loggedIn'],
            'userRole' => $_SESSION['userRole'],
            'posts' => $posts
        ]);
    }
}
