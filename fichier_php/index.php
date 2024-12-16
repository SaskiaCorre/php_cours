<?php
echo "<h1>Les fichiers</h1>
<p>Nous avons la possibilité en PHP d’importer des fichiers à l’intérieur d’un répertoire de notre projet/machine.
<br>
Pour se faire, nous allons utiliser la super globale \$_FILES.
Quand on importe un fichier celui-ci va se retrouver dans un dossier temporaire (à la racine du serveur apache, dans le dossier tmp), le serveur va lui donner un nom temporaire (ex: tmp_45644651321.jpg).</p>";
/*
 * -----------------------------------------------------
 *              Test (import du fichier) :
 * -----------------------------------------------------
*/
// Permet de tester si le fichier importé existe et qu'il est différent de NULL
if (isset($_FILES['file'])) {
    // Stocke le chemin et le nom temporaire du fichier importé (ex /tmp/125423.pdf)
    $tmpName = $_FILES['file']['tmp_name'];

    // Stocke le nom du fichier (nom du fichier et son extension importé ex : test.jpg)
    $name = $_FILES['file']['name'];
   
    // La taille du fichier en octets
    $size = $_FILES['file']['size'];
   
    // Stocke les erreurs (problème d'import, de droits, etc...)
    $error = $_FILES['file']['error'];
   
    // Déplace le fichier importé dans le dossier image à la racine du projet
    $fichier = move_uploaded_file($tmpName, "./imgs/$name");
}


echo "<p>Nous allons utiliser le type file des champs HTML pour pouvoir importer un fichier.</p>
<p>Ici notre fichier va être importé par méthode POST dans le dossier /tmp, à la racine du serveur.</p>";
?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Importer un fichier</title>
    </head>
    <body>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <h2>Importer une image</h2>
            <input type="file" name="file">
            <br>
            <button type="submit">importer</button>
        </form>
    </body>
</html>