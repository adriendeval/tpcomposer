<?php
$couleur = "#FFFFFF"; // Couleur par défaut (blanc)

if (isset($_COOKIE["couleur_preferee"])) {
    $couleur = $_COOKIE["couleur_preferee"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["couleur"])) {
    setcookie("couleur_preferee", $_POST["couleur"], time() + 3600);
}
?>

<!DOCTYPE html>
<html>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 24px;
        background-color: <?php echo $couleur; ?>;
    }
</style>

<body>
    <h1>Bienvenue sur notre site !</h1>
</body>

<form method="post" action="index.php">
    <label for="couleur">Choisissez votre couleur préférée :</label>
    <input type="color" id="couleur" name="couleur" value="<?php echo $couleur; ?>">
    <button type="submit">Valider</button>
</form>

</html>