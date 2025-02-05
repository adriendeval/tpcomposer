<?php

require 'vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Symfony\Component\Dotenv\Dotenv;

// Premiers pas avec les sessions et cookies
print("Premiers pas avec les sessions et cookies\n");

$log = new Logger('ApplicationSIO');
$log->pushHandler(new StreamHandler('log/info.log', Level::Debug));

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');