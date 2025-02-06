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

<!DOCTYPE html>
<html>
<body>

<h2>Connexion</h2>

<form action="login.php" method="post">
  <label for="username">Nom d'utilisateur :</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Mot de passe :</label><br>
  <input type="password" id="password" name="password"><br><br>
  <input type="submit" value="Se connecter">
</form>

</body>
</html>