<?php
/**
 * Praktikum DBWT. Autoren:
 * Dominik, Bien, 3149135
 * Botho Karl Mortimer, von Chappuis, 3146023
 * Date: 11/5/20
 * Time: 8:57 PM
 */

$gerichte = [
    ['name' => 'Veganes Makis (Sushi)', 'preis_intern' => '2,40', 'preis_extern' => '3,10', 'bild' => 'sushi.jpg'],
    ['name' => 'Indisches Dal mit Paprikareis', 'preis_intern' => '1,80', 'preis_extern' => '2,40', 'bild' => 'dal.jpg'],
    ['name' => 'Chinesische Nudelpfanne mit Erdnusssoße', 'preis_intern' => '2,70', 'preis_extern' => '3,50', 'bild' => 'noodles.jpg'],
    ['name' => 'Mango Kürbis Suppe', 'preis_intern' => '1,60', 'preis_extern' => '2,10', 'bild' => 'soup.jpg'],
];

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