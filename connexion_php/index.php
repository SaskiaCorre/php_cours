<?php
    $DB_NAME = "clubLecture";
    $DB_USER = "root";
    $DB_PASS = "";

    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=' . $DB_NAME, $DB_USER, $DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// Pour appeler le code dans plusieurs pages sans avoir à le répéter, on utilise include qui signale l'erreur sans arréter le programme ou require, qui stoppe le programme dès la première erreur
include('./connect.php');

if(empty($_SESSION["adherent"])) {        
// Permet de détruire la session PHP courante ainsi que toutes les données rattachées
    session_destroy();
    header("Location: connexion.php");
}

echo "<p>Le problème ici est que le mot de passe s'affiche en clair sur la BDD</p>
<p>Pour hacher le mot de passe, il faut modifier le bindParam du fichier inscription.php en ajoutant la ligne :</p>
<p>\$user_password = password_hash et en modifiant le bindParam du mot de passe : bindParam(:\"user_password\", \$user_password);</p>
<p>Ensuite, on désincrit l'utilisateur et le réinscrit pour constater que le mot de passe est hacher dans la BDD</p>";
?>
    
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h1>index.PHP</h1>
    <p><a href="deconnexion.php">Se déconnecter</a></p>
</body>
</html>