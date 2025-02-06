<?php
$couleur = "#FFFFFF"; // Couleur par défaut (blanc)

if (isset($_COOKIE["couleur_preferee"])) {
    $couleur = $_COOKIE["couleur_preferee"];
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
    <p><a href="set_color.php">Choisir une autre couleur</a></p>
</body>

</html>