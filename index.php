<?php
session_start();
?>

<!DOCTYPE html>
<html>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 24px;
    }
</style>

<body>
    <h1>Bienvenue sur notre site !</h1>
    <p><a href="set_color.php">Choisir une autre couleur</a></p>
</body>

</html>

<?php

require 'vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Symfony\Component\Dotenv\Dotenv;

print("Premiers pas avec les sessions et les cookies");