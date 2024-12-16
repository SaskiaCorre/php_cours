<?php 
session_start();

try{
    $db = new PDO('mysql:host=localhost;dbname=adrar', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(PDOException $e) {
    //throw $e;
    $db = NULL;
    echo ("Erreur: " . $e->getMessage());
}
?>