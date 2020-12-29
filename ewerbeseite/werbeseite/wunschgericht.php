<?php
require_once("../database/Database.php");



if(isset($_POST['senden']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
    $db = new Database();
    $gericht = $_POST['gericht'];
    $beschreibung = $_POST['beschreibung'];
    $email = $_POST['email'];
    if(empty($_POST['name']))
    {
        $name =  "anonym";
    }
    else
    {
        $name = $_POST['name'];
    }


   $db->insertWunsch($gericht, $beschreibung, $name ,$email);

    echo "Vielleicht wirds genommen, vielleicht aber auch nicht";
}
?>

<form action="wunschgericht.php" method="POST">

    <label for="gericht">Gerichtname:</label><br>
    <input id="gericht" name="gericht" type="text"><br>

    <label>Beschreibung:</label><br>
    <textarea id="beschreibung" name="beschreibung"></textarea><br>

    <label>Name:</label><br>
    <input id="name" name="name" type="text"><br>

    <label>E-Mail:</label><br>
    <input id="email" name="email" type="email"><br>

    <input type="submit" value="Wunsch abschicken" name="senden">
</form>
