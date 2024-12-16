<?php
echo "<h3>Les conditions</h3>";
echo "<h5>Fonction qui teste si un nombre est positif ou négatif</h5>";
function test($int) {
    if($int > 0) {
        return "positif";
    } elseif($int < 0) {
        return "négatif";
    } else {
        return "vaut 0";
    }
}

echo "-1: " . test(-1);
echo " 1: " . test(1);

echo "<h5>Fonction qui prend en entrée 3 valeurs et retourne le nombre le plus grand</h5>";
function max_number($a, $b, $c) {
    return max($a, $b, $c);
}
echo max_number(5, 50, -2);

echo "<h5>Fonction qui prend en entrée 3 valeurs et retourne le nombre le plus petit</h5>";
function min_number($a, $b, $c) {
    return min($a, $b, $c);
}
echo min_number(5, 50, -2);
?>