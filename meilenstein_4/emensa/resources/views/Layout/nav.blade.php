<header class="site-head" >
    <nav class="row" >
        <!--logo-->
        <div class="col-header logo">
            <!--<img class="logo-img" id=logo src="e-mensa-logo.png"> -->
            <a href="/"><h1>E-Mensa Logo</h1></a>
        </div>
        <!--Menu-Navigation-->
        <div class=col-header>
            <ul id="menu-hauptnavigation" class="menu">
                <li class="menu-item" >
                    <a href="/">Ankündigung</a>
                </li>
                <li class="menu-item">
                    <a href="/meals">Speisen</a>
                </li>
                <li class="menu-item">
                    <a href="">Zahlen</a>
                </li>
                <li class="menu-item">
                    <a href="/contact">Kontakt</a>
                </li>
                <li class="menu-item">
                    <a href="/about">Über uns</a>
                </li>
                <li class="menu-item">
                    <a href="/bewertungen">Bewertung</a>
                </li>
                <li class="menu-item">
                    <?php
                    if (!isset($_SESSION['user'])){
                        echo '<a href="/login">Anmeldung</a>';
                    }
                    else{
                        echo '<a href="/logout">Abmeldung</a>';
                    }?>
                </li>
            </ul>
        </div>
        <?php if (isset($_SESSION['user'])) echo '<div class=col-header><a href="/meinebewertungen">Sie sind angemeldet als '.$_SESSION['user'].'</a></div>';?>
    </nav>
    <hr>
</header>
