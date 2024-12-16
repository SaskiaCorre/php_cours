<?php
    // var_dump($_FILES);
    if (isset($_FILES['galerie']) && !empty($_FILES['galerie'])) {
        $extensions_ok = array('png', 'jpg');

        // Cette ligne vient vérifier si l'extension du fichier importé est présente dans le tableau $extensions_ok
        if (!in_array(substr(strrchr($_FILES['galerie']['name'], '.'), 1), $extensions_ok)) {
            echo '<span style="color: red;">Extension non autorisée</span>';
        } else {
            // Cette ligne vient vérifier si la taille du fichier n'excède pas la taille renseignée
        if (filesize($_FILES['galerie']['tmp_name']) > 2097152) {
            echo '<span> style="color: red;" > La taille du fichier dépasse les 2MO</span>;';
                } else {
                    //Cette ligne vient récupérer le nom original du fichier
                    $file_name = basename($_FILES['galerie']['name']);
                    // replace les caractères accentués
                    $accents = '/&([A-Za-z]{1,2})(grave|acute|circ|cedil|uml|lig);/';
                    $string_encoded = htmlentities($file_name, ENT_NOQUOTES, 'UTF-8');
                    $file_name = preg_replace($accents,'$1',$string_encoded);
                    move_uploaded_file($_FILES['galerie']['tmp_name'], "./imgs/" . $_FILES['galerie']['name']);
                }
            }
        }
?>

<!DOCTYPE html>
<html lang="fr">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
      </head>
      <body>
            <form action="acceptHTML.php" method="post" enctype="multipart/form-data">
                  <p>Fichier:</p>
                  <input type="file" name="image" accept=".png, .jpg" multiple>
                  <br>
                  <input type="submit" value="Envoyer">
            </form>
      </body>
</html>
