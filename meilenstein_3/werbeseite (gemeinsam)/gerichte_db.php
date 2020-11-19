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
$query = "SELECT g.name, g.preis_intern, g.preis_extern, GROUP_CONCAT(gha.code) FROM gericht as g JOIN gericht_hat_allergen AS gha ON gha.gericht_id = g.id GROUP BY g.id ORDER BY RAND() LIMIT 5;";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_row($result)){
    array_push($gerichte, $row);
    foreach(explode(',', $row[3]) as $allergen){
        if (!in_array($allergen, $allergene)){
            array_push($allergene, $allergen);
        }
    }
}



function number_of_meals(){
    global $gerichte;
    return sizeof($gerichte);
}
echo "<table class=\"preis\">
                <thead>
                <tr>
                    <th>

                    </th>
                    <th class=\"preis-head\">
                        Preis intern
                    </th>
                    <th class=\"preis-head\">
                        Preis extern
                    </th>
                    <th class=\"preis.head\">
                        Allergene
                    </th>
                </tr>
                </thead>

                <tbody>";
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
                        <small>".$gericht[3]."</small>
                    </td>
                </tr>";
}

echo "<tr class=dots>
                    <td>
                        <p>...</p>
                    </td>
                    <td>
                        <p>...</p>
                    </td>
                    <td>
                        <p>...</p>
                    </td>
                    <td>
                        <p>...</p>
                    </td>
                </tr>
                </tbody>
            </table>";

echo "<h3>Liste aller Allergene</h3>
<p>".(implode(', ', $allergene))."</p>";
?>