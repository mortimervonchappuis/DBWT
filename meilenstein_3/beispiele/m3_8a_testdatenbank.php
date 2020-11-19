<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta CHARSET="UTF-8">
            <title>Aufgabe 6</title>
        </head>
        <body>
            <main>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Gericht</td>
                            <td>Zutaten</td>
                            <td>Datum</td>
                            <td>Vegetarisch</td>
                            <td>Vegan</td>
                            <td>Preis intern</td>
                            <td>Preis extern</td>
                        </tr>
                    </thead>
                    <tbody>
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
                    $query = "SELECT * FROM gericht;";
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_row($result)){
                        echo "<tr>";
                        echo "<td>".$row[0]."</td>\n";
                        echo "<td>".$row[1]."</td>\n";
                        echo "<td>".$row[2]."</td>\n";
                        echo "<td>".$row[3]."</td>\n";
                        echo "<td>".($row[4] ? '&#x2611;' : '&#x2612;')."</td>\n";
                        echo "<td>".($row[5] ? '&#x2611;' : '&#x2612;')."</td>\n";
                        echo "<td>".number_format($row[6],2)."€</td>\n";
                        echo "<td>".number_format($row[7],2)."€</td>\n";
                        echo "</tr>\n";
                    }
                    ?>
                    </tbody>
                </table>
            </main>
        </body>
    </html>
</DOCTYPE>