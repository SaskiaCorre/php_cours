<?php
echo "<h1>Se connecter à la BDD en local</h1>
<p>En amont, il faut aller sur la fenêtre de Xampp et cliquer sur Admin de MySQL </p>";
    $DB_NAME = "caisse";
    $DB_USER = "root";
    $DB_PASS = "";

    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=' . $DB_NAME, $DB_USER, $DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

echo "<h1>Récupérer les données</h1>
<h4>ici, les produits et leurs prix de la BDD caisse</h4>";
    // Exécution de la requête SQL avec un try catch pour la gestion des exceptions (messages d’erreurs)
    try {
        // Requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
        $reponse = $bdd->query('SELECT * FROM produit');
        // Boucle pour parcourir et afficher le contenu de chaque ligne de la table
        while ($donnees = $reponse->fetch()) {
            // Affichage des données par les colonnes de la bdd par leurs noms d’attributs respectifs
            echo '<p>' . $donnees['nom_produit'] . ": ". $donnees['tarif'] . '</p>';
        }
    } catch(Exception $e) {
        // Affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
    }

echo "<h1>Réquêtes préparées</h1>";
    // Préparation de la requête SQL nous stockons dans une variable $req la requête à exécuter
    $req = $bdd->prepare('SELECT * FROM vendeur where nom_vendeur=:nom_vendeur');
    // La fonction bindParam permet de "filtrer" notre requête de manière sécurisée, la valeur ne peut pas lui être donnée directement
    $prenom_vendeur = "Marie";
    $req->bindParam(":nom_vendeur", $nom_vendeur);
    // Exécution de la requête SQL
    $req->execute();
   
    // Boucle pour parcourir et afficher le contenu de chaque ligne de la table
    foreach($req->fetchAll() as $donnee) {
        // Affichage des données du résultat de la requête par leurs noms d’attributs
        echo '<p>Boucle FOREACH' . $donnee['nom_vendeur'] . " " . $donnee['prenom_vendeur'] . '</p>';
    }
    // var_dump($donnee);

    // Fermeture de la connexion à la bdd (économise des ressources)
    // $req->closeCursor();

    echo "<p>2ème requête</p>";
    $req1 = $bdd->query('SELECT * FROM vendeur');
    $data1 = $req1->fetchAll(PDO::FETCH_NUM);
    var_dump($data1);

    echo "<p>3ème requête</p>";
    $req2 = $bdd->query('SELECT * FROM vendeur;');
    $data2 = $req2->fetchAll(PDO::FETCH_ASSOC);
    var_dump($data2);

    echo "<p>4ème requête</p>";
    $req3 = $bdd->query('SELECT * FROM vendeur;');
    $data3 = $req3->fetchAll();
    var_dump($data3);  

// La requête d'affichage commence par le mot-clé SELECT
    // Après le select, on note les colonnes que l'on désire, séparées par une virgule
    // * si on désire toutes les colonnes
    $select = " SELECT nom_vendeur, prenom_vendeur
                FROM vendeur
                WHERE 1;";
   
    // La requête d'insertion commence par les mots-clés INSERT INTO
    // Après le select, on note les colonnes que l'on va remplir sur notre nouvelle ligne, séparées par une virgule
    // Ensuite, après le mot-clé VALUES on vient préciser le contenu de chaque colonne
    $insert = " INSERT INTO vendeur(nom_vendeur, prenom_vendeur)
                VALUES ('Lecorre','William');";

    // La requête de mise à jour commence par le mot-clé UPDATE
    // Ensuite, on vient saisir la colonne=nouvelle valeur pour chaque colonne désirée
    $update = " UPDATE vendeur
                SET nom_vendeur='Dupont',
                    prenom_vendeur='Jean'
                WHERE 1;";
   
    // La requête de suppression commence par le mot-clé DELETE
    $delete = "DELETE FROM produit WHERE id_produit=7";
?>
