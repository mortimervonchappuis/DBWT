<?php
/**
 * Praktikum DBWT. Autoren:
 * Dominik, Bien, 3149135
 * Botho Karl Mortimer, von Chappuis, 3146023
 * Date: 11/5/20
 * Time: 8:57 PM
 */


// Aufgabe 7
$port = 3306;
$link = mysqli_connect("127.0.0.1", "root", "root","emensawerbeseite", $port);

$gerichte = [];
$allergene = [];
$query = "SELECT g.name, g.preis_intern, g.preis_extern, GROUP_CONCAT(gha.code) FROM gericht as g JOIN gericht_hat_allergen AS gha GROUP BY g.id ORDER BY RAND() LIMIT 5;";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_row($result)){
    array_push($gerichte, $row);
}



function number_of_meals(){
    global $gerichte;
    return sizeof($gerichte);
}

foreach($gerichte as $gericht){
    echo " 
                <tr>
                    <td class=\"preis-schrift\">
                        ".$gericht[0]."
                    </td>
                    <td class=\"preis-euro\">
                        ".number_format($gericht[1], 2)."€
                    </td>
                    <td class=\"preis-euro\">
                        ".number_format($gericht[2], 2)."€
                    </td>
                    <td>
                        ".$gericht[3]."
                    </td>
                </tr>";
}
?>