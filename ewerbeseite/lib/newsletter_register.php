<?php
session_start();
require_once "StaticHelper.php";

$name = $_POST['name'];
$email = $_POST['email'];
$sprache = $_POST['newsletter-lang'];
$dsgvo = $_POST['accept-datenschutz'];
$_SESSION['$nameErr'] = "";
$_SESSION['$emailErr'] = "";
$_SESSION['$dsgvoErr'] = "";


function fakemails($mail)
{
    $fakes = ['rcpt.at',
        'damnthespam.at',
        'wegwerfmail.de',
        'trashmail.de',
        'trashmail.com',
        'trashmail.net',
        'trashmail.org'
        ];

    foreach($fakes as $fake)
    {
        $pos = strpos($mail, $fake);
        if($pos !== false)
        {
            return true;
        }
    }
    return false;
}

if (ctype_space($name) || empty($name))
{
    $_SESSION['$nameErr'] = "Name ist leer oder besteht nur aus Leerzeichen";
}
if ((!filter_var($email, FILTER_VALIDATE_EMAIL) || fakemails($email) || empty($email)))
{
    $_SESSION['$emailErr'] = "Die E-Mail ist nicht korrekt formatiert oder Endung wird nicht akzeptiert.";
}

if(empty($dsgvo))
{
    $_SESSION['$dsgvoErr'] = "Bitte akzeptieren Sie die Datenschutzbestimmung.";
}

if(empty($_SESSION['$emailErr']) && empty($_SESSION['$nameErr']) && empty($_SESSION['$dsgvoErr']))
{
    $file = fopen(StaticHelper::NEWSLETTER_REGISTRATIONS_PATH, 'a');
    $text = $name . ";" . $email . ";" . $sprache . "\n";
    fwrite($file, $text);
    fclose($file);
}

header("Location: ../werbeseite/index.blade.php#kontakt");



