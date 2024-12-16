<?php
      if (isset($_FILES['file'])) {
            // Cette ligne vient récupérer le nom originel du fichier
            $file_name = basename($_FILES['import']['imgs']);
            // replace les caractères accentués
            $accents = '/&([A-Za-z]{1,2})(grave|acute|circ|cedil|uml|lig);/';
            $string_encoded = htmlentities($file_name, ENT_NOQUOTES, 'UTF-8');
            $file_name = preg_replace($accents,'$1',$string_encoded);
            move_uploaded_file($_FILES['file']['tmp_name'], "./imgs/" . $file_name);
      }
?>
<!DOCTYPE html>
<html lang="fr">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Importer</title>
      </head>
      <body>
            <form method="post" enctype="multipart/form-data">
                  <p>Fichier:</p>
                  <input type="file" name="file">
                  <br>
                  <input type="submit" value="Envoyer">
            </form>
      </body>
</html>



