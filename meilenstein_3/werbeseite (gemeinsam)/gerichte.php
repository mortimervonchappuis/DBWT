<?php
/**
 * Praktikum DBWT. Autoren:
 * Dominik, Bien, 3149135
 * Botho Karl Mortimer, von Chappuis, 3146023
 * Date: 11/5/20
 * Time: 8:57 PM
 */

$filename = "gerichte.csv";
$file = fopen($filename, 'r');
$gerichte = [];
$keys = ['name', 'preis_intern', 'preis_extern', 'bild'];
while (!feof($file)){
    $line = explode(";", fgets($file));
    $gericht = [];
    for ($i = 0; $i < sizeof($keys); $i++){
        $array[$keys[$i]] = $line[$i];
    }
    array_push($gerichte, $array);
}

function number_of_meals(){
    global $gerichte;
    return sizeof($gerichte);
}

foreach($gerichte as $gericht){
    echo " 
                <tr>
                    <td class=\"preis-schrift\">
                        ".$gericht['name']."
                    </td>
                    <td class=\"preis-euro\">
                        ".$gericht['preis_intern']."
                    </td>
                    <td class=\"preis-euro\">
                        ".$gericht['preis_extern']."
                    </td>
                    <td>
                        <img src='img/".$gericht['bild']."' alt='nope' width=200>
                    </td>
                </tr>";
}
?>