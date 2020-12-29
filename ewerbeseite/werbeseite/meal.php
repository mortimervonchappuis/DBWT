<?php

const GET_PARAM_MIN_STARS = 'search_min_stars';
const GET_PARAM_SEARCH_TEXT = 'search_text';
const GET_PARAM_SHOW_DESC = 'show_description';

$translations =
    [
        'de' =>
            [
                'meal_h1' => "Gericht: ",
                'allergene_h1' => "Allergene",
                'tb_allergene_th_nr' => "Allergen-Nr.",
                'tb_allergene_th_desc' => "Beschreibung",
                'ranking_h1' => "Bewertungen (Insgesamt: ",
                'search_btn_text' => "Suchen",
                'tb_rankings_desc' => "Text",
                'tb_rankings_author' => "Autor",
                'tb_rankings_stars' => "Sterne",
            ],
        'en' =>
            [
                'meal_h1' => "Meal: ",
                'allergene_h1' => "Allergene",
                'tb_allergene_th_nr' => "Allergene-Nr.",
                'tb_allergene_th_desc' => "Description",
                'ranking_h1' => "Feedback/Raking (Overall: ",
                'search_btn_text' => "Serach",
                'tb_rankings_desc' =>"Feedback",
                'tb_rankings_author' =>"Author",
                'tb_rankings_stars' =>"Stars",
            ]
    ];

$lang = 'de';
//Übersetzungslogik
if (key_exists('lang', $_GET)){
    if(key_exists($_GET['lang'],$translations)){
        $lang =  $_GET['lang'];
    }
}

/**
 * Liste aller möglichen Allergene.
 */
$allergens = array(
    11 => 'Gluten',
    12 => 'Krebstiere',
    13 => 'Eier',
    14 => 'Fisch',
    17 => 'Milch');

$meal = [ // Kurzschreibweise für ein Array (entspricht = array())
    'name' => 'Süßkartoffeltaschen mit Frischkäse und Kräutern gefüllt',
    'description' => 'Die Süßkartoffeln werden vorsichtig aufgeschnitten und der Frischkäse eingefüllt.',
    'price_intern' => 2.90,
    'price_extern' => 3.90,
    'allergens' => [11, 13],
    'amount' => 42   // Anzahl der verfügbaren Gerichte.
];

$ratings = [
    ['text' => 'Die Kartoffel ist einfach klasse. Nur die Fischstäbchen schmecken nach Käse. ',
        'author' => 'Ute U.',
        'stars' => 2],
    ['text' => 'Sehr gut. Immer wieder gerne',
        'author' => 'Gustav G.',
        'stars' => 4],
    ['text' => 'Der Klassiker für den Wochenstart. Frisch wie immer',
        'author' => 'Renate R.',
        'stars' => 4],
    ['text' => 'Kartoffel ist gut. Das Grüne ist mir suspekt.',
        'author' => 'Marta M.',
        'stars' => 3]
];

$showRatings = [];
//Gleichschaltung der Strings durch strtolower()
if (!empty($_GET[GET_PARAM_SEARCH_TEXT])) {
    $searchTerm = strtolower($_GET[GET_PARAM_SEARCH_TEXT]);
    foreach ($ratings as $rating) {
        if (strpos(strtolower($rating['text']), $searchTerm) !== false) {
            $showRatings[] = $rating;
        }
    }
} else if (!empty($_GET[GET_PARAM_MIN_STARS])) {
    $minStars = $_GET[GET_PARAM_MIN_STARS];
    foreach ($ratings as $rating) {
        if ($rating['stars'] >= $minStars) {
            $showRatings[] = $rating;
        }
    }
} else {
    $showRatings = $ratings;
}

function calcMeanStars($ratings): float
{ // : float gibt an, dass der Rückgabewert vom Typ "float" ist
    $sum = 0; //gefixt: startwert war bei 1
    $i = 0; //gefixt: startwert war bei 1
    $totalCount = count($ratings);

    foreach ($ratings as $rating) {
        $sum += $rating['stars'];
    }
    if ($totalCount > 0){
        return $sum / $totalCount;
    }else{
        return 0;
    }

}

$searchTerm = (!empty($_GET[GET_PARAM_SEARCH_TEXT])) ? $_GET[GET_PARAM_SEARCH_TEXT] : '';

?>
<!DOCTYPE html>
<html lang="<?php echo $lang?>">
<head>
    <meta charset="UTF-8"/>
    <title><?php echo $translations[$lang]['meal_h1']. $meal['name']; ?></title>
    <style type="text/css">
        * {
            font-family: Arial, serif;
        }

        .rating {
            color: darkgray;
        }
    </style>
</head>
<body>
<h1><?php echo $translations[$lang]['meal_h1']. $meal['name']; ?></h1>
<p>
    <?php
    if (key_exists(GET_PARAM_SHOW_DESC, $_GET)) {
        echo $meal['description'];
    }
    ?>
</p>
<p>
    <h4>Preise:</h4>
    <ul>
        <li>Intern: <?php echo number_format($meal['price_intern'],2,',','.')?> €</li>
        <li>Extern: <?php echo number_format($meal['price_extern'],2,',','.')?> €</li>
    </ul>
</p>
<p>
<h4><?php echo $translations[$lang]['allergene_h1']?></h4>
<table border="1">
    <thead>
        <tr>
            <th><?php echo $translations[$lang]['tb_allergene_th_nr']?></th>
            <th><?php echo $translations[$lang]['tb_allergene_th_desc']?></th>
        </tr>
    </thead>
    <tbody>

    <?php
    foreach ($meal['allergens'] as $allergenNr) {

        echo"
        <tr>
          <td>{$allergenNr}</td>
          <td>{$allergens[$allergenNr]}</td>              
        </tr>";
    }
    ?>

    </tbody>
</table>
</p>

<h1><?php echo $translations[$lang]['ranking_h1'] . calcMeanStars($ratings); ?>)</h1>
<form method="get">
    <label for="search_text">Filter:</label>
    <input id="search_text" type="text" name="search_text" value="<?php echo $searchTerm?>">
    <input type="submit" value="<?php echo $translations[$lang]['search_btn_text']?>">
</form>
<table class="rating" border="1">
    <thead>
    <tr>
        <th><?php echo $translations[$lang]['tb_rankings_desc']?></th>
        <th><?php echo $translations[$lang]['tb_rankings_author']?></th>
        <th><?php echo $translations[$lang]['tb_rankings_stars']?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($showRatings as $rating) {
        echo "<tr>
                      <td class='rating_text'>{$rating['text']}</td>
                      <td class='rating_author'>{$rating['author']}</td>
                      <td class='rating_stars'>{$rating['stars']}</td>
                  </tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>