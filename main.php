<?php

require 'vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PHPMailer\PHPMailer\PHPMailer;
use Symfony\Component\Dotenv\Dotenv;

function addFighter($l) {
    // TODO : Ajouter le code pour insérer un combattant dans la base de données

    $l->info('The fighter is added');
}

$log = new Logger('ApplicationSIO');
$log->pushHandler(new StreamHandler('log/info.log', Level::Warning));

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

addFighter($l);