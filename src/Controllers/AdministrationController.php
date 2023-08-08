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
        $comments = $this->commentRepository->getNonApprovedComments();
        $this->twig->display('pages/administration/index.html.twig', [
            'loggedIn' => $_SESSION['loggedIn'],
            'userRole' => $_SESSION['userRole'],
            'comments' => $comments
        ]);
    }
}
