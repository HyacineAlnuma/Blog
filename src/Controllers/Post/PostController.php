<?php

namespace App\Controllers\Post;

use App\Entity\Database;
use App\Repository\CommentRepository;

class PostController extends AbstractPostController
{
    private CommentRepository $commentRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
        $connection = new Database();
        $this->commentRepository = new CommentRepository();
        $this->commentRepository->connection = $connection;
    }

    public function execute(int $id)
    {
        if ($_POST) {
            if ($_POST['content'] !== '') {
                $this->commentRepository->addComment($id, $_POST);
            } else {
                throw new Exception("Le champ n'est' pas correctement rempli");
            }
        }
        $post = $this->postRepository->getPost($id);
        $comments = $this->commentRepository->getPostComments($id);
        $approvedComments = [];
        for ($i = 0; $i < count($comments); $i++) {
            if ($comments[$i]->approved === 1) {
                $approvedComments = $comments[$i];
            }
        }

        $this->twig->display('pages/post/index.html.twig', [
            'post' => $post,
            'comments' => $approvedComments
        ]);
    }
}
