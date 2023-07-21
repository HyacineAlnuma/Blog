<?php

namespace App\Controllers\Comment;

use App\Entity\Database;
use App\Repository\CommentRepository;
use App\Controllers\Controller;

class AddCommentController extends Controller
{
    private CommentRepository $commentRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
        $connection = new Database();
        $this->commentRepository = new CommentRepository();
        $this->commentRepository->connection = $connection;
    }

    public function execute($id, $inputs)
    {
        $this->commentRepository->addComment($id, $inputs);

        header("Location: index.php?action=post&id=$id");
    }
}
