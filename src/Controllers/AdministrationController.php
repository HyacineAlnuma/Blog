<?php

namespace App\Controllers;

use App\Entity\Database;
use App\Controllers\Controller;
use App\Repository\CommentRepository;

class AdministrationController extends Controller
{
    private CommentRepository $commentRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
        $connection = new Database();
        $this->commentRepository = new CommentRepository();
        $this->commentRepository->connection = $connection;
    }

    public function execute()
    {
        if ($_SESSION['user'] == null || $_SESSION['user']->getUserRole() == 'user') {
            header("Location: /");
        } else {
            $comments = $this->commentRepository->getNonApprovedComments();
            $this->display('pages/administration/index.html.twig', [
                'comments' => $comments
            ]);
        }
    }
}

