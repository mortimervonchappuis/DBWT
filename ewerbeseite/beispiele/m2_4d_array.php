<?php
$famousMeals = [
    1 => ['name' => 'Currywurst mit Pommes',
        'winner' => [2001, 2003, 2007, 2010, 2020]],
    2 => ['name' => 'Hähnchencrossies mit Paprikareis',
        'winner' => [2002, 2004, 2008]],
    3 => ['name' => 'Spaghetti Bolognese',
        'winner' => [2011, 2012, 2017]],
    4 => ['name' => 'Jägerschnitzel mit Pommes',
        'winner' => 2019]
];

function noVictoryRoyale($arr)
{
    for($i = 2000 ; $i<= 2020; $i++)
    {
        $found = true;
        foreach($arr as $key => $value)
        {
            foreach ($value as $key2 => $value2)
            {
                if(is_array($value2))
                {
                    foreach ($value2 as $wert)
                    {
                        if($wert == $i)
                        {
                            $found = false;
                        }
                    }
                }
                else if(is_integer($value2))
                {
                    if($value2 == $i)
                    {
                        $found = false;
                    }
                }
            }
        }
        if($found == true)
        {
            echo $i . "<br>";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Aufgabe 2e</title>
    <style type="text/css">
        ol li{
            margin-bottom: 7px;
        }
        .inhalt::before{
            content: "";
            width: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>
<?php
echo '<ol>';
foreach($famousMeals as $key => $value)
{
    echo '<li>';
    foreach ($value as $key2 => $value2)
    {
        if(is_array($value2))
        {
            $array = array_reverse($value2);
            $comma_separated = implode(", ", $array);
            echo '<div class=inhalt>' . $comma_separated . '</div>';
        }
        else
        {
            echo '<div class=inhalt>' . $value2 . '</div>';
        }
    }
    echo '</li>';
}
echo '</ol>';

noVictoryRoyale($famousMeals);
?>
</body>
</html>