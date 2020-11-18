<?php
/**
 * Praktikum DBWT. Autoren:
 * Dominik, Bien, 3149135
 * Botho Karl Mortimer, von Chappuis, 3146023
 * Date: 11/18/20
 * Time: 3:17 PM
 */

$filename = "visit_count.txt";
$file = fopen($filename, "a+");
if (key_exists('REMOTE_ADDR', $_SERVER)){
    $addr = $_SERVER['REMOTE_ADDR'];
}
else{
    $addr = "no address";
}
$line = date("d.m.y").";".$addr."\n";
fwrite($file, $line);
rewind($file);

$visitors = [];
$numer_of_visitors = 0;
while (!feof($file)){
    $numer_of_visitors++;
    $line = fgets($file);
    if (!in_array($line, $visitors)){
        array_push($visitors, $line);
    }
}
echo $numer_of_visitors." (".(sizeof($visitors) - 1).") "; //last line in file is empty and therefore does not count
fclose($file);
?>