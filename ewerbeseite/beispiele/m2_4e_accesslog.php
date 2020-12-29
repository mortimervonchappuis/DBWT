<?php
$file = fopen('accesslog.txt', a);

if(!$file)
{
    die('Öffnen fehlgeschlagen');
}
else
{
    echo "File geoeffnet <br>";
}

$text = date('[Y-m-d H:i:s]: ', $_SERVER['REQUEST_TIME']) ;
$text .= $_SERVER['REMOTE_ADDR'] . ' ';
$text .= $_SERVER['HTTP_USER_AGENT'] . "\n";
fwrite($file, $text);

fclose($file);
if(!$file)
{
    die('Schliessen fehlgeschlagen');
}
else
{
    echo "File geschlossen <br>";
}

