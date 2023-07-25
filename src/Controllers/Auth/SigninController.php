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

    public function execute($inputs)
    {
        $this->authRepository->signin($inputs);

        header("Location: index.php");
    }

    public function render()
    {
        $this->twig->display('auth/signin.html.twig');
    }
}
