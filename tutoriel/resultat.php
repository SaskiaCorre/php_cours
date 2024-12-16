<?php
    // La fonction isset permet de tester l'existence d'une variable et si elle est différente de NULL
    if(isset($_GET['nom'])){
        $nom = $_GET['nom'];
        echo "Mon nom est : $nom";
    }

    if (isset($_FILES['file'])) {
        // Cette ligne vient vérifier si la taille du fichier n'excède pas 2Mo // 1Mo = 	1 048 576
        if (filesize($_FILES['file']['tmp_name']) > 2097152) {
              echo '<span style="color: red;">La taille du fichier dépasse les 2Mo</span>';
        } else {
              move_uploaded_file($_FILES['file']['tmp_name'], "./imgs/" . $_FILES['file']['name']);
        }
  }

?>