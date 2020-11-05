<?php
/**
 * Praktikum DBWT. Autoren:
 * Dominik, Bien, 3149135
 * Botho Karl Mortimer, von Chappuis, 3146023
 * Date: 11/5/20
 * Time: 8:23 PM
 */

$file = fopen("accesslog.txt", "a");
if (key_exists('HTTP_USER_AGENT', $_SERVER)){
    $browser = $_SERVER['HTTP_USER_AGENT'];
}
else{
    $browser = "no browser";
}
if (key_exists('REMOTE_ADDR', $_SERVER)){
    $addr = $_SERVER['REMOTE_ADDR'];
}
else{
    $addr = "no address";
}

$line = "Time: ".date("d.m.y")." Browser: ".date("h:i")." ".$browser." IP: ". $addr."\n";
fwrite($file, $line);
fclose($file);