<?php

session_start();

//StatikHelper
require_once("../lib/StaticHelper.php");
require_once("../database/Database.php");

//StatikHelper ist eine Helferklasse zum auswerten der Log-Datei
$vCount = StaticHelper::getVisitorsCount();
$vCount++;
StaticHelper::writeVisitorsCount($vCount);

$nr = StaticHelper::getNewsLetterRegistrations();
$nrCount = count($nr);

$db = new Database();
$allMeals = $db->getAllMeals();
$allAllergens = $db->getAllAllergens();

$meals = require_once('../inc/meals.php');
?>
<!doctype html>
<html>
<head>
    <title>Start | E-Mensa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/e-mensa.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="#">
        <img src="../img/logo.png" alt="logo">
    </a>

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#ankuendigung">Ankündigung</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#speisen">Speisen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#zahlen">Zahlen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#kontakt">Kontakt</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#wichtig">Wichtig für Uns</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="wunschgericht.php">Wünsch dir was</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">

    <div class="content">
        <!--oberer Teil-->

        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../img/very_nice.png" alt="Los Angeles">
                    <div class="carousel-caption">
                        <h3>Eupener Straße</h3>
                        <p>Die beste FH-Kantine, vom gesamten Campus.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../img/very_nice.png" alt="Chicago" class="slider-img">
                    <div class="carousel-caption">
                        <h3>Bayernalle</h3>
                        <p>Wir sind zwar in der Bayernalle, bayrisches Essen gibt es hier aber nicht!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../img/very_nice.png" alt="New York">
                    <div class="carousel-caption">
                        <h3>Südpark</h3>
                        <p>Wir sind im Keller!</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

        <h2 id="ankuendigung">Bald gibt es Essen auch online ;)</h2>
        <p class="info">Damit Ihr eure faulen Kadaver nicht mehr aus dem Keller schleppen müsst, könnt Ihr euch in
            Zukunft auch die Wampenpflege nach Hause liefern lassen.<br> Lorem ipsum dolor sit amet, consetetur
            sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
            voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
            takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero
            eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
            tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.<br><br>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
            clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
            sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
            sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing
            elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
            voluptua.<br>
            At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus
            est Lorem ipsum dolor sit amet.</p>
        <br>
        <h2 id="speisen">Köstlichkeiten, die Sie erwarten</h2>
        <table class="angebot">
            <thead>
            <tr>
                <th>Gericht</th>
                <th>Preis intern</th>
                <th>Preis extern</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            //Durchlaufen der Gerichte
            foreach ($allMeals as $meal) {
                $allStr = "";
                $allergens = array();
                //Prüfen ob das Gericht Allergene enthält
                if (!empty($meal['allergens'])) {
                    //enthaltene Allergene konkatinieren
                    foreach ($meal['allergens'] as $allergen) {
                        $allergens[] = '<b>' . $allergen['code'] . '</b>';
                    }
                    $allStr = "<span class='included-allergens'>" . implode(", ", $allergens) . "</span>";
                }
                echo "
                            <tr>
                                <!--Falls die Bilder noch einmal zurück kommen ;-) <td><img src='../img/{}' class='foot-img'></td>-->
                                <td>
                                    {$meal['name']}
                                    {$allStr}
                                </td>
                                <td>" . number_format($meal['preis_intern'], 2, ',', '.'), " €</td>
                                <td>" . number_format($meal['preis_extern'], 2, ',', '.'), " €</td>
                            </tr>
                        ";
                $i++;
                //Es sollen erstaml nur 5 Gerichte angezeigt werden, da man aber später eventuell mehr Gerichte anziegen möchte z.B. über Javascript wurde dies so gelöst
                if ($i == 5)
                    break;
            }
            ?>
            </tbody>
        </table>

        <?php
        $allergens = array();
        //Ausgabe alle Allergene
        foreach ($allAllergens as $allergen) {

            $allergens[] = '<b>' . $allergen['code'] . '</b>=' . $allergen['name'];
        }
        echo "<p class='allergens-info'><b><u>Allergene</u></b>: " . implode(', ', $allergens) . '</p>';
        ?>
        <h2>E-Mensa in Zahlen</h2>
        <table class="stats">
            <tr>
                <td><span class="zahl counter" data-target="<?php echo $vCount; ?>">0</span> Besuche</td>
                <td><span class="zahl counter" data-target="<?php echo $nrCount; ?>"><?php echo $nrCount; ?></span>
                    Anmeldungen zum Newsletter
                </td>
                <td><span class="zahl counter"
                          data-target="<?php echo count($meals); ?>"><?php echo count($meals); ?></span> Speisen
                </td>
            </tr>
        </table>

        <!--Unterer Teil -->
        <h2 id="kontakt">Interesse geweckt? Wir informieren Sie!</h2>
        <form action="../lib/newsletter_register.php" method="post">
                <span style="display:inline-block">
                <label style="display:block">Ihr Name:</label>
                    <input type="text" name="name" placeholder="Vorname">
                </span>
            <span style="display:inline-block">
                <label style="display:block">Ihre E-Mail:</label>
                    <input type="text" name="email" placeholder="E-Mail">
                </span>
            <span style="display:inline-block">
                <label style="display:block">Newsletter bitte in:</label>
                    <select name="newsletter-lang">
                        <option value="de" selected>Deutsch</option>
                        <option value="en">Englisch</option>
                        <option value="es">Spanisch</option>
                    </select>
                </span>
            <br>
            <input type="checkbox" name="accept-datenschutz"> Den <a href="datenschutz.html">Datenschutzbestimmungen</a>
            stimme ich zu
            <input type="submit" value="Zum Newsletter anmelden">
            <span style="display: block; color: #ff0000; font-weight: bold">
                    <?php
                    //Gibt nur die Fehlermeldungen aus die auch aufgetreten sind
                    if (!empty($_SESSION['$nameErr'])) {
                        echo $_SESSION['$nameErr'] . '<br>';
                    }
                    if (!empty($_SESSION['$emailErr'])) {
                        echo $_SESSION['$emailErr'] . '<br>';
                    }
                    if (!empty($_SESSION['$dsgvoErr'])) {
                        echo $_SESSION['$dsgvoErr'];
                    }
                    ?>
                    </span>
        </form>
        <h2 id="wichtig">Das ist uns wichtig</h2>
        <ul class="keywords">
            <li> Beste frische saisonale Zutaten</li>
            <li> Ausgewogene abwechslungsreiche Gerichte</li>
            <li> Sauberkeit</li>
        </ul>
        <h2 class="center">Wir freuen uns auf Ihren Besuch!</h2>

    </div>



</div>


</body>
</html>

