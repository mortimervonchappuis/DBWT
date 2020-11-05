<html lang="de">
<form method="POST">
    <input name="a" id="a"><label for="a">A: </label>
    <br>
    <input name="b" id="b"><label for="b">B: </label>
    <br>
    <input type="submit" formaction="m2_4c_addform.php?calc=add" value="Addieren">
    <br>
    <input type="submit" formaction="m2_4c_addform.php?calc=mul" value="Multiplizieren">
</form>
<?php
/**
 * Praktikum DBWT. Autoren:
 * Dominik, Bien, 3149135
 * Botho Karl Mortimer, von Chappuis, 3146023
 * Date: 11/5/20
 * Time: 6:30 PM
 */
if (!empty($_GET)){
    $calc = $_GET['calc'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    if ($calc == 'add'){
        echo "<p>".$a." + ".$b." = ".($a+$b)."</p>";
    }
    else if($calc == 'mul'){
        echo "<p>".$a." * ".$b." = ".($a*$b)."</p>";
    }
}?>
</html>
