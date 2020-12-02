<?php
/**
 * Praktikum DBWT. Autoren:
 * Dominik, Bien, 3149135
 * Botho Karl Mortimer, von Chappuis, 3146023
 * Date: 12/2/20
 * Time: 9:10 PM
 */
include("db_stuff.php");
$query = "SELECT * FROM wunschgericht;";
$result = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html lang="de">
<meta charset="UTF-8">
<title>Ihre E-Mensa</title>
<link rel="stylesheet" type="text/css" href="mockup.css"/>
<link href="https://fonts.googleapis.com/css?family=Schoolbell&v1" rel="stylesheet">
</head>
<!--Top-->
<body>
<?php include("parts/header.html"); ?>
<main>
    <hr>
    <div class=container>
        <div class="picture-placeholder">
            <img class=banner src="banner.png" alt='nö'>
        </div>
        <div id="neuigkeiten">
            <h2 class="headline-bold">Bald gibt es Essen auch online ;)</h2>
            <p id="fliesstext">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <br>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
        </div>
        <!--Preis tabelle-->
        <div class="preis" id="speisen">
            <h2 class="headline-bold">Köstlichkeiten, die Sie erwarten!</h2>

            <?php
            include($gerichte_file);
            ?>

        </div>

        <div class="counter" id="counter">
            <h2 class="headline-bold">E-Mensa in Zahlen</h2>
            <ul class="counter-grid">
                <li class="counter-var">
                    <?php include "visit_count.php" ?>
                </li>
                <li class="counter-name">
                    Besuche
                </li>
                <li class="counter-var">
                    <?= number_of_newsletter_subscribers() ?>
                </li>
                <li class="counter-name">
                    Anmelungen zum Newsletter
                </li>
                <li class="counter-var">
                    <?= number_of_meals() ?>
                </li>
                <li class="counter-name">
                    Speisen
                </li>
            </ul>
        </div>

        <div class="newsletter" id="newsletter">
            <h2 class="headline-bold">Interesse geweckt? Wir informieren Sie!</h2>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <div class=row>
                    <div class=col>
                        <p class="newsletter-vorname">
                            <label for="name">Ihr Name:</label><br>
                            <input type="text"  id="name" name="name" placeholder="Name" value="<?= $name ?>">
                            <span class="error"> <?= $name_error?></span>
                        </p>
                    </div>
                    <div class=col>
                        <p class="newsletter-email">
                            <label for="email">Ihre E-Mail:</label><br>
                            <input type="text" id="email" name="email" placeholder="E-Mail" value="<?= $email ?>">
                            <span class="error"> <?= $email_error?></span>
                        </p>
                    </div>
                    <div class=col>
                        <p class="newsletter-language">
                            <label for="language">Newsletter bitte in:</label><br>
                            <select id="language" name="language">
                                <option value="de">Deutsch</option>
                                <option value="en">Englisch</option>
                            </select>
                        </p>
                    </div>
                </div>
                <div class=row>
                    <div class=col>
                        <p class="datenschutz">
                            <input type="checkbox" id="datenschutz" name="datenschutz">
                            <label for="datenschutz">Den Datenschutzbestimmungen stimme ich zu</label>
                        </p>
                        <span class="error"> <?= $datenschutz_error?></span>
                    </div>
                    <div class=col>
                        <p class="submit">
                            <input type="submit" value="Zum Newsletter anmelden">
                        </p>
                    </div>
                </div>
            </form>
        </div>

        <div class="fakenews" id="info">
            <h2 class="headline-bold">Das ist uns wichtig!!!</h2>
            <ul >
                <li>Beste frische saisonale Zutaten</li>
                <li>Ausgewogene abwechslungsreiche Gerichte</li>
                <li>Sauberkeit</li>
            </ul>
        </div>

        <h2 class="last-headline-bold">Wir freuen uns auf Ihren Besuch!</h2>
    </div>
</main>
<?php include("parts/footer.html"); ?>
</html>

