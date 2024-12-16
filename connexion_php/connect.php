<?php
    // Cette fonction sert à démarrer une session PHP (que vous pouvez notamment retrouver dans vos cookies)
    session_start();

    try {
        $db = new PDO('mysql:host=localhost;dbname=clubLecture', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(PDOException $e) {
        $db = NULL;
        echo ("Erreur: " . $e->getMessage());
    }
?>
