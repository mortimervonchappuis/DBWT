<html lang="de">
<style>
    li{
        margin-bottom: 10px;
    }
</style>
<ol>
<?php
/**
 * Praktikum DBWT. Autoren:
 * Dominik, Bien, 3149135
 * Botho Karl Mortimer, von Chappuis, 3146023
 * Date: 11/5/20
 * Time: 6:49 PM
 */
$famousMeals = [
    1 => ['name' => 'Veganes Makis (Sushi)',
        'winner' => [2001, 2003, 2007, 2010, 2020]],
    2 => ['name' => 'Indisches Dal mit Paprikareis',
        'winner' => [2002, 2004, 2008]],
    3 => ['name' => 'Chinesische Nudelpfanne mit Erdnusssoße',
        'winner' => [2011, 2012, 2017]],
    4 => ['name'=> 'Mango Kürbis Suppe',
        'winner' => 2019]
];

foreach($famousMeals as $key => $val){
    if (is_array($val['winner'])){
        $years = join(', ', $val['winner']);
    }
    else{
        $years = $val['winner'];
    }
    echo "<li>".$val['name']."<br>".$years."</li>
";
}

function no_winners($array, $start=2000, $stop=2020){
    $winners=[];
    foreach($array as $key => $val){
        if (is_array($val['winner'])){
            $winners = array_merge($winners, $val['winner']);
        }
        else{
            array_push($winners, $val['winner']);
        }
    }
    return array_diff(range($start, $stop), $winners);
}

echo "</ol>
<p>There are no winners in the years ".join(', ', no_winners($famousMeals))."</p>";
?>
</html>