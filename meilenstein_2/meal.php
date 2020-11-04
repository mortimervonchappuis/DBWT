<?php
const GET_PARAM_MIN_STARS = 'search_min_stars';
const GET_PARAM_SEARCH_TEXT = 'search_text';
const GET_PARAM_SHOW_DESCRIPTION = 'show_description';
session_start();
/**
 * Liste aller möglichen Allergene.
 */
$allergens = array(
    11 => 'Gluten',
    12 => 'Krebstiere',
    13 => 'Eier',
    14 => 'Fisch',
    17 => 'Milch'
    )
;

$meal = [ // Kurzschreibweise für ein Array (entspricht = array())
    'name' => 'Süßkartoffeltaschen mit Frischkäse und Kräutern gefüllt',
    'description' => 'Die Süßkartoffeln werden vorsichtig aufgeschnitten und der Frischkäse eingefüllt.',
    'price_intern' => 2.90,
    'price_extern' => 3.90,
    'allergens' => [11, 13],
    'amount' => 42   // Anzahl der verfügbaren Gerichte.
];

$ratings = [
    [   'text' => 'Die Kartoffel ist einfach klasse. Nur die Fischstäbchen schmecken nach Käse. ',
        'author' => 'Ute U.',
        'stars' => 2 ],
    [   'text' => 'Sehr gut. Immer wieder gerne',
        'author' => 'Gustav G.',
        'stars' => 4 ],
    [   'text' => 'Der Klassiker für den Wochenstart. Frisch wie immer',
        'author' => 'Renate R.',
        'stars' => 4 ],
    [   'text' => 'Kartoffel ist gut. Das Grüne ist mir suspekt.',
        'author' => 'Marta M.',
        'stars' => 3 ]
];

$showRatings = [];
if (!empty($_GET[GET_PARAM_SEARCH_TEXT])) {
    $searchTerm = $_GET[GET_PARAM_SEARCH_TEXT];
    foreach ($ratings as $rating) {
        if (stripos($rating['text'], $searchTerm) !== false) { //strpos zu stripos -->> stripos = case insensitive Aufgagbe 3c)
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

function calcMeanStars($ratings) : float { // : float gibt an, dass der Rückgabewert vom Typ "float" ist
    $sum = 0;
    $i = 1;
    foreach ($ratings as $rating) {
        $sum += $rating['stars'];   // $rating['stars'] / $i ergibt keinen sinn ebenso wie $sum = 1 Aufgabe 3d)
        $i++;
    }
    return $sum / count($ratings);
}

//-----------------------------------------------------------------------------------------
//Aufgabe 3g)

$lang = array(
            array(
                'Gericht',
                'Bewertung',
                'Insgesamt',
                'Suchen'
            ),
            array(
                'Meal',
                'Rating',
                'Average',
                'Search')
);
$languagedecide = 0;

if($_GET['lan'] == 'e')
    $languagedecide = 1;


?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8"/>


        <title>Gericht: <?php echo $meal['name']; ?></title>
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

    <a href="meal.php?lan=d">Deutsch</a>
    <a href="meal.php?lan=e">English</a>
        <h1><?php  echo $lang[$languagedecide][0]?>: <?php echo $meal['name']; ?></h1>

        <p><?php if (!empty($_GET[GET_PARAM_SHOW_DESCRIPTION])){
            echo $meal['description'];
            }

            ?></p>


        <table>
            <tr>
                <td>Mitglieds </td>
                <td>Preis: </td>
                <td><?php echo number_format($meal['price_intern'],2)."€" ?></td>
            </tr>
            <tr>
                <td>Gast </td>
                <td>Preis: </td>
                <td><?php echo number_format($meal['price_extern'],2)."€"?></td>
            </tr>
        </table>

        <!--: mein teil 3b) -->
        <p>* Vorsicht kann enthalten: </p>
        <p><?php foreach($meal['allergens'] as $allergen)
            echo"<ul> <li>$allergens[$allergen]</li> </ul>";
        ?></p>

        <h1><?php echo $lang[$languagedecide][1]." (".$lang[$languagedecide][2]." ".calcMeanStars($ratings); ?>)</h1>
        <form method="GET">
            <input id="show_description" type="checkbox" name="show_description" >  <!--Aufgabe 3e) -->
            <label for="show_description">Zeige die Beschreibung an</label><br>

            <label for="search_text">Filter:</label>
            <input id="search_text" type="text" name="search_text"  value="<?php if (!empty($_GET[GET_PARAM_SEARCH_TEXT]))echo $_GET[GET_PARAM_SEARCH_TEXT] ?>">    <!-- Aufgabe 3f)-->
            <input type="submit" value="<?php echo $lang[$languagedecide][3]?>">

        </form>
        <table class="rating">
            <thead>
            <tr>
                <td>Text</td>
                <td>Sterne</td>
                <td>Author</td>
            </tr>
            </thead>
            <tbody>
            <?php
        foreach ($showRatings as $rating) {
            echo "<tr><td class='rating_text'>{$rating['text']}</td>
                      <td class='rating_stars'>{$rating['stars']}</td>
                      <td class='rating_author'>{$rating['author']}</td>
                  </tr>";
        }
        ?>
            </tbody>
        </table>
    </body>
</html>