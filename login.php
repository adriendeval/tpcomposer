<?php
session_start();

// Données d'exemple
$users = [
    'admin' => 'password123',
    'user' => 'mypassword'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
    } else {
        echo "Identifiants incorrects.";
    }
}
?>