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
                $user = $this->authRepository->login($_POST);
                if (password_verify($_POST['password'], $user->passwordHash)) {
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['userId'] = $user->id;
                    $_SESSION['username'] = $user->username;
                    $_SESSION['userRole'] = $user->userRole;
                    header("Location: index.php");
                } else {
                    $errors[] = "Le nom d'utilisateur ou le mot de passe sont incorrects.";
                }
            } else {
                $errors[] = 'Les champs ne sont pas correctement remplis.';
            }
        }

        $this->twig->display('pages/auth/login.html.twig', [
            'errors' => $errors
        ]);
    }

    public function logout()
    {
        $_SESSION['loggedIn'] = false;
        $_SESSION['userId'] = '';
        $_SESSION['username'] = '';
        $_SESSION['userRole'] = '';
        header("Location: index.php");
    }
}
