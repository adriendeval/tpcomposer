<?php

require 'vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Symfony\Component\Dotenv\Dotenv;

function addFighter($l, $DATABASE_HOST, $DATABASE_NAME, $DATABASE_USERNAME, $DATABASE_PASSWORD, $DATABASE_PORT, $DATABASE_DIALECT)
{
    try {
        $l->info("Trying to connect to the database $DATABASE_NAME on $DATABASE_HOST:$DATABASE_PORT with $DATABASE_DIALECT dialect");
        $dbh = new PDO("$DATABASE_DIALECT:host=$DATABASE_HOST;dbname=$DATABASE_NAME", $DATABASE_USERNAME, $DATABASE_PASSWORD);

        ////////////////////////////////////////////////////////////////////////////////////

        // Préparation de la requête
        $stmt = $dbh->prepare("INSERT INTO fighters (name, strength, defense) VALUES (:name, :strength, :defense)");

        //Déclaration des variables
        $name = "Miss Fortune";
        $strength = 100;
        $defense = 50;

        // Liaison des paramètres
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':strength', $strength);
        $stmt->bindParam(':defense', $defense);

        // Exécution de la requête
        $stmt->execute();

        ////////////////////////////////////////////////////////////////////////////////////

        $l->info('Connection has been established');
    } catch (\PDOException $e) {
        $l->error('Connection failed: ' . $e->getMessage());
    }

    // $l->info('The fighter has been added to the database');
}

function checkStrength($strength) {
    if($strength < 0) {
        throw new Exception('La force du guerrier ne peut pas être négative');
    }
}

// Premiers pas avec les requêtes préparées
print("Premiers pas avec la gestion des erreurs (Exceptions)\n");

$log = new Logger('ApplicationSIO');
$log->pushHandler(new StreamHandler('log/info.log', Level::Debug));

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

// addFighter($log, $_ENV['DATABASE_HOST'], $_ENV['DATABASE_NAME'], $_ENV['DATABASE_USERNAME'], $_ENV['DATABASE_PASSWORD'], $_ENV['DATABASE_PORT'], $_ENV['DATABASE_DIALECT']);

try {
    checkStrength(-5);
} catch (\Throwable $th) {
    $log->error($e->getMessage());
    echo "Erreur ! $th->getMessage()\n\n";
}

print("Le programme continue...\n");