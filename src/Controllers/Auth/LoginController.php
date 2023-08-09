<?php

namespace App\Controllers\Auth;

use App\Entity\Database;
use App\Repository\AuthRepository;
use App\Controllers\Controller;

class LoginController extends Controller
{
    private PostRepository $postRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
        $connection = new Database();
        $this->authRepository = new AuthRepository();
        $this->authRepository->connection = $connection;
    }

    public function login()
    {
        $errors = [];
        if ($_POST) {
            if ($_POST['username'] !== '' && $_POST['password'] !== '') {
                $user = $this->authRepository->getUserByUsername($_POST);
                if ($user == null) {
                    $errors[] = "Le nom d'utilisateur est incorrect.";
                } else {
                    if (password_verify($_POST['password'], $user->passwordHash)) {
                        $_SESSION['user'] = $user;
                        header("Location: /");
                    } else {
                        $errors[] = "Le mot de passe est incorrect.";
                    }
                }
            } else {
                $errors[] = 'Les champs ne sont pas correctement remplis.';
            }
        }

        $this->display('pages/auth/login.html.twig', [
            'errors' => $errors
        ]);
    }

    public function logout()
    {
        session_destroy();
        header("Location: index.php");
    }
}
