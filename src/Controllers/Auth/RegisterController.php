<?php

namespace App\Controllers\Auth;

use App\Entity\Database;
use App\Repository\AuthRepository;
use App\Controllers\Controller;

class RegisterController extends Controller
{
    private AuthRepository $authRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
        $connection = new Database();
        $this->authRepository = new AuthRepository();
        $this->authRepository->connection = $connection;
    }

    public function execute()
    {
        $errors = [];
        
        if ($_POST) {
            $getByUsername = $this->authRepository->getUserByUsername($_POST);
            $getByEmail = $this->authRepository->getUserByEmail($_POST);
            if ($_POST['username'] == '' || $_POST['email'] == '' || $_POST['password'] == '') {
                $errors[] = 'Les champs ne sont pas correctement remplis.';
            } elseif (isset($getByUsername) || isset($getByEmail)) {
                $errors[] = "Ce nom d'utilisateur ou cet email sont déjà utilisés.";
            } else {
                $this->authRepository->register($_POST);
                header("Location: /login");
            }
        } 

        $this->display('pages/auth/register.html.twig', [
            'errors' => $errors
        ]);
    }
}
