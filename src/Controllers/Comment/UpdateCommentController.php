<?php

namespace App\Controllers\Comment;

use App\Entity\Database;
use App\Repository\CommentRepository;
use App\Controllers\Controller;

class UpdateCommentController extends Controller
{
    public function execute($id, $inputs)
    {
        $connection = new Database();

        $commentRepository = new commentRepository();
        $commentRepository->connection = $connection;
        $commentRepository->updateComment($id, $inputs);
    }
}
