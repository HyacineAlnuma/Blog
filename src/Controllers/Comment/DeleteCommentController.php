<?php

namespace App\Controllers\Comment;

use App\Entity\Database;
use App\Repository\CommentRepository;
use App\Controllers\Controller;

class DeleteCommentController extends AbstractCommentController
{
    public function execute(int $id)
    {
        if ($_SESSION['user'] == null || $_SESSION['user']->getUserRole() == 'user') {
            header("Location: /");
        } else {
            $this->commentRepository->deleteComment($id);

            header("Location: /administration");
        }
    }
}
