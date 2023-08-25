<?php

namespace App\Controllers\Comment;

use App\Entity\Database;
use App\Repository\CommentRepository;
use App\Controllers\Controller;

class ApproveCommentController extends AbstractCommentController
{
    public function execute(int $id)
    {
        $this->commentRepository->approveComment($id);

        header("Location: /administration");
    }
}
