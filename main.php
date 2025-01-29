<?php

require 'vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PHPMailer\PHPMailer\PHPMailer;
use Symfony\Component\Dotenv\Dotenv;

$log = new Logger('ApplicationSIO');
$log->pushHandler(new StreamHandler('log/info.log', Level::Warning));

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$log->info('Démarrage de l\'envoi d\'un mail');
$mail = new PHPMailer(true);

try {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'mail.infomaniak.com';
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['SMTP_USERNAME'];
    $mail->Password = $_ENV['SMTP_PASSWORD'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    
    $mail->isHTML(true); // Paramétrer le format de l'email en HTML
    $mail->setFrom($_ENV['SMTP_USERNAME'], $_ENV['SMTP_USERNAME']);
    $mail->addAddress($_ENV['SMTP_USERNAME'], $_ENV['SMTP_USERNAME']);
    $mail->Subject = 'Ceci est un test';
    $mail->Body    = '<br><h1 align="center">Coucou Adrien</h1><p>Comment vas-tu ?</p>';

    $mail->send();
    $log->info('Message envoyé');
    echo 'Message envoyé !';
} catch (Exception $e) {
    $log->error('Envoi impossible. Erreur : ' . $mail->ErrorInfo);
}

$log->info('Fin de l\'envoi d\'un mail');

?>