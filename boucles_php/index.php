<?php
echo "<h3>Les boucles</h3>";
echo "<h5>FOR : tant que \$i est inférieur à 10, on répète l’opération</h5>";
for ($i = 0 ; $i < 10 ; $i++) {
    echo 'Ceci est une boucle for en PHP';
    echo '<br>';
}

echo "<h5>WHILE : tant que \$i est inférieur à 10, on répète l’opération</h5>";
$i = 0;
while ($i < 10) {
    //j’affiche la valeur de $i
    echo $i;
    //à chaque tour j’incrémente $i (+1)
    $i++;
    //je saute une ligne
    echo '<br>';
}

echo "<h5>FOREACH : ce type de boucle est généralement utilisé pour parcourir les tableaux, des strings et des objets</h5>";
foreach ($tableau as $valeur) {
    echo $valeur.'<br />'."\n";
}
?>