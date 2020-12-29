<?php

error_reporting(E_ALL);
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

$host = "localhost";
$user = "root";
$pw = "root";
$db = "emensawerbeseite";

$link = mysqli_connect($host,$user,$pw,$db);

$sql = "SELECT * FROM allergen";

$result = mysqli_query($link, $sql);
if (!$result) {
    echo "Fehler während der Abfrage:  ", mysqli_error($link);
    exit();
}
?>
<table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Typ</th>
        </tr>
    </thead>
    <tbody>
<?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr> <td>', $row['code'] ,'</td> <td>', $row['name'],'</td> <td>',  $row['typ'] ,'</td> </tr>';
    }
mysqli_free_result($result);
mysqli_close($link);
?>
    </tbody>
</table>";