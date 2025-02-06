<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

echo "Bienvenue, " . $_SESSION['username'] . "!";
?>

<p><a href="logout.php">Se déconnecter</a></p>
<link rel="stylesheet" href="style.css">