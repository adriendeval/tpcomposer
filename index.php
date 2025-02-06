<?php
$couleur = "#FFFFFF"; // Couleur par défaut (blanc)


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["couleur"])) {
    $couleur = $_POST["couleur"];
    setcookie("couleur_preferee", $couleur, time() + 3600);
}
else {
    if (isset($_COOKIE["couleur_preferee"])) {
        $couleur = $_COOKIE["couleur_preferee"];
    }
}

?>

<!DOCTYPE html>
<html>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 24px;
        background-color: <?php echo $couleur; ?>;
        color: <?php echo $couleur == "#000000" ? "#FFFFFF" : "#000000"; ?>;
    }
</style>

<body>
    <h1>Sessions et cookies</h1>
</body>

<form method="post" action="index.php">
    <label for="couleur">Choisissez votre couleur préférée :</label>
    <input type="color" id="couleur" name="couleur" value="<?php echo $couleur; ?>">
    <button type="submit">Valider</button>
</form>

</html>