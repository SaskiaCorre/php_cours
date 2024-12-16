<?php 
include('./connect.php');
include('./_classes.php');
   

if(!empty($_POST["form_inscription"])) {
    // On recherche si l'adresse email existe déjà en BDD
    $select = $db->prepare("SELECT email FROM adherent WHERE email=:email;");
    $select->bindParam(":email", $_POST["form_email"]);
    // Nous hachons notre mdp avec l'algo BCRYPT et un coût algorithmique (par défaut à 10)
    $mdp = password_hash($_POST['form_password'], PASSWORD_BCRYPT, array("cost" => 12));
    $select->execute();
    if(empty($select->fetch(PDO::FETCH_COLUMN))) {
        // Si ce n'est pas le cas, on vient l'insérer
        $insert = $db->prepare("INSERT INTO adherent(email, mdp)
                                VALUES(:email, :mdp);");
        $insert->bindParam(":email", $_POST['form_email']);
        $insert->bindParam(":mdp", $mdp);
        if($insert->execute()) {
            // Si aucune erreur ne se produit, on propose de se connecter
            die('<p style="color: green;">Inscription réussie.</p><a href="connexion.php">Se connecter.</a>');
        }
        die('<p style="color: red;">Inscription échouée.</p><a href="inscription.php">Réessayer.</a>');
    }
}
?>
if(!empty($_POST['form_inscription'])) {
    $utilisateur->insert($_POST['form_nom'], $_POST['form_prenom'], $_POST['form_pseudo'], $_POST['form_mdp'], $_POST['form_role']);
    header("Location: ../views/index.php");
}