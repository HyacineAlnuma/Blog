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

    public function __construct($twig)
    {
        parent::__construct($twig);
    }

    public function execute()
    {
        $this->twig->display('pages/homepage/index.html.twig');
    }

    public function sendEmail(array $inputs)
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'hyacinealnuma@gmail.com';
            $mail->Password   = '';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('hyacinealnuma@gmail.com', 'Hyacine');
            $mail->addAddress('navidotakings@gmail.com', 'Joe User');
            $mail->addReplyTo('hyacinealnuma@gmail.com', 'Hyacine');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
