<?php
    if(isset($_POST['a']) && isset($_POST['b'])){
        echo "La somme est égale à : ".$_POST['a']+$_POST['b'];
    }

    if(isset($_GET['prix_ht']) && isset($_GET['qte']) && isset($_GET['tva'])){
        echo "La prix TTC est égal à : " . $_GET['prix_ht']*$_GET['qte']+($_GET['tva']*$_GET['qte'])
 . " €.";
    }

?>
