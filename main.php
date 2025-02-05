<?php

require 'vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Symfony\Component\Dotenv\Dotenv;

function addFighter($l, $DATABASE_HOST, $DATABASE_NAME, $DATABASE_USERNAME, $DATABASE_PASSWORD, $DATABASE_PORT, $DATABASE_DIALECT)
{
    try {
        $l->info('Trying to connect to the database $DATABASE_NAME on $DATABASE_HOST:$DATABASE_PORT with $DATABASE_DIALECT dialect');
        $dbh = new PDO('$DATABASE_DIALECT:host=$DATABASE_HOST;dbname=test', $DATABASE_USERNAME, $DATABASE_PASSWORD);

        // TODO: Add a fighter to the database

        $l->info('Connection has been established');
    } catch (\PDOException $e) {
        $l->error('Connection failed: ' . $e->getMessage());
    }

    $l->info('The fighter has been added to the database');
}

// Premiers pas avec les requêtes préparées
print("Premiers pas avec les requêtes préparées\n");

$log = new Logger('ApplicationSIO');
$log->pushHandler(new StreamHandler('log/info.log', Level::Warning));

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

// add a fighter
addFighter(
    $log,
    $_ENV['DATABASE_HOST'],
    $_ENV['DATABASE_NAME'],
    $_ENV['DATABASE_USERNAME'],
    $_ENV['DATABASE_PASSWORD'],
    $_ENV['DATABASE_PORT'],
    $_ENV['DATABASE_DIALECT']
);
