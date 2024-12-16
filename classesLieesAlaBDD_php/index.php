<?php
$DB_NAME = "adrar";
$DB_USER = "root";
$DB_PASS = "";

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=' . $DB_NAME, $DB_USER, $DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

include('./connect.php');
include('./_classes.php');

$roles = $db->query("SELECT * FROM roles;")->fetchAll(PDO::FETCH_ASSOC);
$utilisateurs = $utilisateur->select();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout utilisateur</title>
</head>

<body>
    <form action="../controllers/controller_utilisateur.php" method="post">
        <input type="hidden" name="form_inscription" value="1">
        <label for="form_nom">Nom:</label>
        <input type="text" name="form_nom">
        <label for="form_prenom">Prénom:</label>
        <input type="text" name="form_prenom">
        <label for="form_pseudo">Pseudo:</label>
        <input type="text" name="form_pseudo">
        <label for="form_mdp">Mot de passe:</label>
        <input type="password" name="form_mdp">
        <label for="form_role">Role:</label>
        <select name="form_role">
            <?php foreach ($roles as $role) { ?>
                <option value="<?= $role['role_id'] ?>"><?= $role['role_libelle'] ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Ajouter">
    </form>

    <?php if (!empty($utilisateurs)) { ?>
        <br />
        <table style="border: 2px solid black; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prénom NOM</th>
                    <th>Pseudo</th>
                    <th>MDP</th>
                    <th>Rôle</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $u) { ?>
                    <tr>
                        <td style="border: 1px solid black;"><?= $u['utilisateur_id'] ?></td>
                        <td style="border: 1px solid black;"><?= $u['utilisateur_prenom'] ?>&nbsp;<?= $u['utilisateur_nom'] ?></td>
                        <td style="border: 1px solid black;"><?= $u['utilisateur_pseudo'] ?></td>
                        <td style="border: 1px solid black;"><?= $u['utilisateur_mdp'] ?></td>
                        <td style="border: 1px solid black;"><?= $u['role_libelle'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</body>

</html>