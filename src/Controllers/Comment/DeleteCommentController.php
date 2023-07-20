<?php

namespace App\Controllers\Comment;

use App\Entity\Database;
use App\Repository\CommentRepository;
use App\Controllers\Controller;

class DeletecommentController extends Controller
{
    public function execute($id)
    {
        $connection = new Database();

        $commentRepository = new commentRepository();
        $commentRepository->connection = $connection;
        $commentRepository->deleteComment($id);
    }
}
