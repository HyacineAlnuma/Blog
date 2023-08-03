<?php

namespace App\Controllers\Auth;

use App\Entity\Database;
use App\Repository\AuthRepository;
use App\Controllers\Controller;

class SigninController extends Controller
{
    private PostRepository $postRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
        $connection = new Database();
        $this->authRepository = new AuthRepository();
        $this->authRepository->connection = $connection;
    }

    public function execute()
    {
        if ($_POST) {
            if (
                $_POST['username'] !== ''
                && $_POST['email'] !== ''
                && $_POST['password'] !== ''
            ) {
                $this->authRepository->signin($_POST);

                header("Location: index.php");
            } else {
                throw new Exception('Les champs ne sont pas correctement remplis');
            }
        }

        $this->twig->display('pages/auth/signin.html.twig');
    }
}
