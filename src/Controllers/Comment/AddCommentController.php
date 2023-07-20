<?php

namespace App\Controllers\Comment;

use App\Entity\Database;
use App\Repository\CommentRepository;
use App\Controllers\Controller;

class AddCommentController extends Controller
{
    public function execute($id, $inputs)
    {
        $connection = new Database();

        $commentRepository = new commentRepository();
        $commentRepository->connection = $connection;
        $commentRepository->addComment($id, $inputs);

        header("Location: index.php?action=post&id=$id");
    }
}
