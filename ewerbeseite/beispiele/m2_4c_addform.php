<?php
include "m2_4a_standardparameter.php";


function multiplizieren($a,$b)
{
    return $a*$b;
}
?>
<!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Addform</title>
    </head>
    <body>
        <form method="post">
            <input type="number" name="zahl1" placeholder="Zahl 1"><br/>
            <input type="number" name="zahl2" placeholder="Zahl 2"><br/>
            <input type="submit" value="addieren" name="add">
            <input type="submit" value="multi" name="mult"><br/><br/>

            <?php
            $a = $_POST["zahl1"];
            $b = $_POST["zahl2"];
            if(isset($_POST["add"]))
            {
                $ausgabe= addieren($a,$b);
                echo $ausgabe;
            }
            if(isset($_POST["mult"]))
            {
                $ausgabe= multiplizieren($a,$b);
                echo $ausgabe;
            }
            ?>
        </form>
    </body>
    </html>
