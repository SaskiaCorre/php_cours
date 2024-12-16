<?php
echo "<h1>Les tableaux php</h1>
<p>Un tableau PHP a pour fonction de stocker et manipuler des informations.
Les tableaux (ou arrays en anglais) sont des types de données structurés permettant de regrouper des informations ensembles. 
<br>Les tableaux peuvent stocker une ou plusieurs valeurs à la fois avec possibilité de mélanger les types.
<br>Contrairement à d’autres langages, il ne faut pas préciser la dimension du tableau lors de son initialisation, PHP le fait tout seul.
PHP propose également deux types distincts de tableaux: les tableaux à index numériques et les tableaux associatifs. 
Pour déclarer un nouveau tableau, c’est comme pour n’importe quelle variable, \$mon_tableau qui prendra comme valeur la fonction array avec ou sans paramètre.</p>";

echo "<h5>Tableau vide</h5>"; 
$legumes = array();
var_dump($legumes);

echo "<h5>Tableau indexé numériquement</h5>"; 
$tab1 = array(1,8,7,11);
var_dump($tab1);

echo "<h5>Tableau associatif</h5>"; 
$identite = array(
    'nom' => 'RODRIGUES',
    'prenom' => 'Marceau',
    'age' => 23,
    'estFormateur' => true
);
var_dump($identite);

echo "<h5>Ajouter une valeur au tableau vide</h5>"; 
$legumes[] = 'salade';
var_dump($legumes);

echo "<h5>Ajouter une valeur au tableau numérique</h5>"; 
$tab1[1] = 9;
var_dump($tab1);

echo "<h5>Création d'un tableau \$prenoms</h5>";
$prenoms[0] = 'Marceau';
$prenoms[1] = 'Ruben';
$prenoms[2] = 'Julien';
echo "<p>OU<p>";
$prenoms = array('Marceau', 'Ruben', 'Julien');
echo "<p>Parcours de tout le tableau</p>";
foreach ($prenoms as $key => $value) {
    echo '<br>';
    // Affiche le contenu de la case à chaque tour.
    print_r($key . ": " . $value);
}

echo "<h5>Ajouter une valeur au tableau associatif</h5>"; 
$identite['email'] = "kbdevphp@gmail.com";
var_dump($identite);

echo "<p>Récupérer les valeurs d'un tableau dans la console</p>";
$tableau = ["indexTab0", "indexTab1", "indexTab2"];
var_dump($tableau);

print_r($argc);
print_r($argv);
?>