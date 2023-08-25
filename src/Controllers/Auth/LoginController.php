<?php

namespace App\Controllers\Auth;

use App\Entity\Database;
use App\Repository\AuthRepository;
use App\Controllers\Controller;

class LoginController extends Controller
{
    private AuthRepository $authRepository;

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
            $user = $this->authRepository->getUserByUsername($_POST);
            if ($_POST['username'] == '' || $_POST['password'] == '') {
                $errors[] = 'Les champs ne sont pas correctement remplis.';
            } elseif ($user == null) {
                $errors[] = "Le nom d'utilisateur est incorrect.";
            } elseif (!password_verify($_POST['password'], $user->getPasswordHash())) {
                $errors[] = "Le mot de passe est incorrect.";
            } else {
                $_SESSION['user'] = $user;
                header("Location: /");
            }
        } 

        $this->display('pages/auth/login.html.twig', [
            'errors' => $errors
        ]);
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
    }
}
