<?php echo "<h1>Les variables en php</h1>";

$ma_variable = 10;
$total = $ma_variable + 20;
echo "<p>Ma variable Total : $total</p>";

// Initialisation d’une variable int
$int = 5;
// Affichage du contenu de la variable int
echo "<p>Ma variable entier : $int</p>";
// Affichage du type de la variable int
echo gettype($int);

// Initialisation d’une variable string
$string = "Saskia";
// Affichage du contenu de la variable string
echo "<p>Ma variable string : $string</p>";

// Initialisation d’une variable boolean
$boolean = false;
// Affichage du type de la variable boolean
echo gettype($boolean);
?>