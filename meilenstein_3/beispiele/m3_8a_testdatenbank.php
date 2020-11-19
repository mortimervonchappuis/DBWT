<?php
/**
 * Praktikum DBWT. Autoren:
 * Dominik, Bien, 3149135
 * Botho Karl Mortimer, von Chappuis, 3146023
 * Date: 11/19/20
 * Time: 5:11 PM
 */

$port = 3306;
$link = mysqli_connect("127.0.0.1", "root", "root","emensawerbeseite", $port);
$query = "";
$result = mysqli_query($link, $query);
