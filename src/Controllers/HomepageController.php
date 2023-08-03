<?php

namespace App\Controllers;

use App\Entity\Database;
use App\Controllers\Controller;

class HomepageController extends Controller
{
    private PostRepository $postRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
    }

    public function execute()
    {
        $this->twig->display('homepage/index.html.twig');
    }

    public function sendEmail($inputs)
    {
        $username = $inputs['username'];
        $email = $inputs['email'];
        $message = $inputs['message'];
        $subject = 'Utilisateur du blog';
        $mailTo = 'hyacinealnuma@hotmail.fr';

        if (mail($mailTo, $subject, $message)) {
            $confirmation = 'Votre email a bien été envoyé !';
            header("Location: index.php");
            $this->twig->display('homepage/index.html.twig', [
                'confirmation' => $confirmation
            ]);
        } else {
            echo "Votre email n'a pas été envoyé";
        }
    }
}
