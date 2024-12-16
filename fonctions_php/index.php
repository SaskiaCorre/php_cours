<?php
echo "<h1>Les fonctions php</h1>";

function addition($param1, $param2) {
    return $param1+$param2;
}
echo "<p>Fonction addition : </p>";
echo addition(10, 20);

function soustraction($a, $b) {
    return $a-$b;
}
echo "<p>Fonction soustraction : </p>";
echo soustraction(10, 2);

echo "<p>Fonction addition avec la concaténation : ".soustraction(50, 30)."</p>";

function test($int) {
    if($int > 0) {
        return "positif";
    } elseif($int < 0) {
        return "négatif";
    } else {
        return "vaut 0";
    }
}

function moyenne($a, $b, $c) {
    return ($a+$b+$c)/3;
}
echo moyenne(10, 20, 30);

function somme($a, $b, $c) {
    return $a+$b+$c;
}
echo somme(10, 20, 30);

function arrondi($float) {
    return round($float);
}
echo arrondi(10.2);
?>