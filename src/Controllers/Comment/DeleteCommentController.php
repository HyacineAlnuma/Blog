<?php

namespace App\Controllers\Comment;

use App\Entity\Database;
use App\Repository\CommentRepository;
use App\Controllers\Controller;

class DeleteCommentController extends AbstractCommentController
{
    public function execute(int $id)
    {
        $this->commentRepository->deleteComment($id);

        header("Location: /administration");
    }
}
