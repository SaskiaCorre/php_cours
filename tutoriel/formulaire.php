<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Formulaire</title>
    </head>
    <body>
        <form action="resultat.php" method="get">
            <p>veuillez saisir votre nom :</p>
            <input type="text" name="nom">
            <br>
            <input type="submit" value="Envoyer">
        </form>

        <form method="post" enctype="multipart/form-data">
                  <p>Fichier:</p>
                  <input type="file" name="file" accept=".png">
                  <br>
                  <input type="submit" value="Envoyer">
            </form>
    </body>
</html>