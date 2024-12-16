<?php
echo "<h1>La concaténation php</h1>";

$echappement = "Caractère d'échappement seul écrit le nom de la variable, non son contenu";
echo "<p>Caractère d'échappement : </p>";
echo "\$echappement";

$concatenation = "<p>La concaténation se fait avec le point : </p>";
echo $concatenation;

$a = "Bon";
$b = "jour ";
$c = 10;
echo $a . $b . $c+1;

$a = "Bonjour ";
echo "<p>" . $a .  "l’Adrar</p>";
?>