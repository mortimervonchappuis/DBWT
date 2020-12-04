<?php
/**
 * Praktikum DBWT. Autoren:
 * Dominik, Bien, 3149135
 * Botho Karl Mortimer, von Chappuis, 3146023
 * Date: 12/2/20
 * Time: 9:10 PM
 */
include("db_stuff.php");
include("sanitize.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $verfasser = trim(sanitize($_POST['verfasser']));
    if ($verfasser == ''){
        $verfasser = 'anonym';
    }
    $email = sanitize($_POST['e-mail']);
    $name = sanitize($_POST['name']);
    $beschreibung = sanitize($_POST['beschreibung']);


    $query = "INSERT INTO wunschgericht(Name, Beschreibung, Erstelldatum) VALUES ('".$name."', '".$beschreibung."', NOW());";
    $result = mysqli_query($link, $query);
    $query = "INSERT INTO erstellerin(Name, E_Mail) SELECT * FROM (SELECT '".$verfasser."', '".$email."') AS tmp 
    WHERE NOT EXISTS (SELECT Name FROM erstellerin WHERE E_Mail = '".$email."') LIMIT 1;";
    $result = mysqli_query($link, $query);
    $query = "INSERT INTO wunschgericht_hat_erstellerin(erstellerin, wunschgericht_id) SELECT '".$email."', id FROM wunschgericht WHERE Name = '".$name."';";
    $result = mysqli_query($link, $query);
}
?>
<!DOCTYPE html>
<html lang="de">
<meta charset="UTF-8">
<title>Ihre E-Mensa</title>
<link rel="stylesheet" type="text/css" href="mockup.css"/>
<link href="https://fonts.googleapis.com/css?family=Schoolbell&v1" rel="stylesheet">
</head>
<!--Top-->
<body>
<?php include("parts/header.html"); ?>
<main>
    <hr>
    <div class=container>
        <div class="picture-placeholder">
            <img class=banner src="banner.png" alt='nö'>
        </div>
        <form action="wunschgericht.php" method="POST">
            <label for="verfasser">Verfasser</label><br>
            <input name="verfasser"><br>
            <label for="e-mail">E-Mail</label><br>
            <input required name="e-mail" type="email"><br>
            <label for="name">Name des Gerichts</label><br>
            <input required name="name"><br>
            <label for="beschreibung">Beschreibung</label><br>
            <textarea name="beschreibung"></textarea><br>
            <button type="submit">Wunsch abschicken</button>
        </form>
    </div>
</main>
<?php include("parts/footer.html"); ?>
</html>

