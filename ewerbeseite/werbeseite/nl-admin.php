<?php
require_once("../lib/StaticHelper.php");

//Entscheidet wie die Daten sortiert werden sollen
switch ($_GET['auswahl']){

    case 'name' : $param = StaticHelper::SORT_BY_NAME;break;
    case 'email' : $param = StaticHelper::SORT_BY_EMAIL;break;
    default: $param = StaticHelper::SORT_BY_REGISTER_TIME;break;
}

//Befüllt das Array mit den Daten aus der Datei in der Reihenfolge wie es sortiert werden soll
$arr = StaticHelper::getNewsLetterRegistrations($param);
$file = fopen(StaticHelper::NEWSLETTER_REGISTRATIONS_PATH, 'r');

//Führt die Suche nur aus wenn ein Wert übers Suchfeld übergeben wurde
if(!empty($_GET['suche']))
{
    $searchTerm = strtolower($_GET['suche']);
    foreach ($arr as $data)
    {
        if (strpos(strtolower($data['name']), $searchTerm) !== false)
        {
            $ablage[] = $data;
        }
    }
    $arr = $ablage;
}



?>

<!doctype html>
<html>
<head>
    <title>Newsletter-Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/e-mensa.css">
</head>
<body>
    <form method=GET style="text-align: center">
        <label for="auswahl">Sortieren nach:</label>
        <select name="auswahl" id="auswahl">
            <option value="nix">Nichts</option>
            <option value="name">Name</option>
            <option value="email">E-Mail</option>
        </select>
        <input type="text" name="suche" placeholder="Namen suche">
        <input type="submit" value="Sortieren">
    </form>

    <table class="angebot">
        <thead>
            <tr>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Sprache</th>
                <th>Datenschutz</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //Durchläuft das Array und gibt die Daten in einer Zeile aus
          foreach ($arr as $nutzer => $daten)
          {
              echo "<tr>";
            foreach ($daten as $spalte => $wert)
            {
                echo "<td>" . $wert ."</td>";
            }
            echo "<td>Ja</td>";
            echo "</tr>";
          }
        ?>
        </tbody>
    </table>
</body>
