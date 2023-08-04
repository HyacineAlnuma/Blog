<?php

namespace App\Controllers;

use App\Entity\Database;
use App\Controllers\Controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class HomepageController extends Controller
{
    private PostRepository $postRepository;
    private string $emailStatus = '';

    public function __construct($twig)
    {
        parent::__construct($twig);
    }

    public function execute()
    {
        $this->twig->display('pages/homepage/index.html.twig', [
            'emailStatus' => $this->emailStatus
        ]);
    }

    public function sendEmail()
    {
        if ($_POST) {
            if ($_POST['username'] !== '' && $_POST['email'] !== '' && $_POST['message'] !== '') {
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'hyacinealnuma@gmail.com';
                    $mail->Password   = 'akwczffraxczhrpl';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = 465;

                    $mail->setFrom('hyacinealnuma@gmail.com', 'Blog');
                    $mail->addAddress('hyacinealnuma@gmail.com', 'Joe User');

                    $mail->isHTML(true);
                    $mail->Subject = 'Contact Utilisateur Blog';
                    $mail->Body    = $_POST['message'] . '<br>From : ' . $_POST['username'] . '<br>Email : ' . $_POST['email'];

                    $mail->send();
                    $this->emailStatus= 'sent';
                    $this->execute();
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $this->emailStatus= 'inputError';
                $this->execute();
            }
        }
    }
}
