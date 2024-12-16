<?php
echo "<h1>Les variables dites super globales</h1>
<p>Le transfert de données entre des pages web est géré en PHP par le biais de variables spéciales nommées “super globales”. 

<p>GET: fait passer les informations dans l’URL de la page. Dangereuse car elle affiche dans l’URL le nom des variables et leur contenu</p>
<p>POST: fait passer les informations par le body de la page, cette méthode est privilégiée car moins dangereuse et permet de transférer des informations de taille plus importante</p>
</p>
<p>Exemple avec le formulaire ci-dessous, qu'on devrait créer dans formulaire.php et les méthodes dans résultat.php</p>
<p>La fonction isset permet de tester l'existence d'une variable et si elle est différente de NULL</p>
<p>Dans résultat.php, essayer la méthoge GET puis POST en remplaçant GET par POST ; observer la différence</p>
<p>Avec POST, on arrive sur la page \"resultat.php\" ; avec GET, sur resultat.php?nom=Saskia</p>";

if(isset($_GET['nom'])){
    $nom = $_GET['nom'];
    echo "Mon nom est : $nom";
}
?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Formulaire</title>
    </head>
    <body>
        <form action="resultat.php" method="get">
            <p>Veuillez saisir votre nom :</p>
            <input type="text" name="nom">
            <br>
            <input type="submit" value="Envoyer">
        </form>

        <form action="form.php" method="post">
            <p>Le nombre a :</p>
            <input type="number" name="a">
      <p>Le nombre b :</p>
      <input type="number" name="b">
      <br>
      <input type="submit" value="Envoyer">
        </form>

<form action="form.php" method="get">
<p>Le prix HT :</p>
      <input type="number" name="prix_ht">
      <p>Le nombre d’articles :</p>
      <input type="number" name="qte">
      <br>
	<p>Le taux de TVA:</p>
      <input type="number" name="tva">
      <br>
      <input type="submit" value="Envoyer">
</form>
    </body>
</html>