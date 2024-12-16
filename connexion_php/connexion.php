<?php
    include('./connect.php');

    if(!empty($_POST["form_connexion"])) {
        $select = $db->prepare("SELECT * FROM adherent WHERE email=:email;");
        $select->bindParam(":email", $_POST["form_email"]);
        //$select->bindParam(":mdp", $_POST["form_password"]);
        $select->execute();
        // La fonction rowCount() permet de donner le nombre de lignes pour une requête
        if($select->rowCount() === 1) {
            $adherent = $select->fetch(PDO::FETCH_ASSOC);
            // On affecte les données de notre utilisateur dans notre super globale $_SESSION
            if(password_verify($_POST["form_password"], $adherent['mdp'])) {
                $_SESSION['adherent'] = $adherent;
            // Le header permet d'effectuer une requête HTTP, la valeur Location permet la redirection vers un autre fichier
            header("Location: index.php");
            }
        } else {
            // La fonction unset permet de vider une variable, ici nous vidons les valeurs pour la clé “user”
            unset($_SESSION['adherent']);
        }
    }
//print_r($_SESSION);
//var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>connexion.PHP</h1>
    <form method="post">
        <input type="hidden" name="form_connexion" value="1">
        <label for="form_email">Email:</label>
        <input type="text" name="form_email" id="form_email" placeholder="Ex: nomprenom@fournisseur.com">
        <label for="form_password">Mot de passe:</label>
        <input type="password" name="form_password" id="form_password" placeholder="1234">
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>