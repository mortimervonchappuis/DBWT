<?php
/**
 * Praktikum DBWT. Autoren:
 * Dominik, Bien, 3149135
 * Botho Karl Mortimer, von Chappuis, 3146023
 * Date: 11/5/20
 * Time: 6:23 PM
 */

include 'm2_4a_standardparameter.php';

$n = 12;
$a = 0;
$b = 1;
for ($i = 0; $i < $n; $i++) {
    $c = addiere($a, $b);
    $a = $b;
    $b = $c;
    echo $b . ", ";
}
?>