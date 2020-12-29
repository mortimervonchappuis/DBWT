<?php
/**
 * Praktikum DBWT. Autoren:
 * Dominik, Bien, 3149135
 * Botho Karl Mortimer, von Chappuis, 3146023
 * Date: 12/3/20
 * Time: 4:29 PM
 */

function sanitize($text){
    $text = str_replace('\'', '', $text);
    $text = str_replace('"', '', $text);
    $text = str_replace(';', '', $text);
    $text = str_replace('--', '', $text);
    $text = str_replace('<script', '', $text);
    $text = str_replace('</script>', '', $text);
    return $text;
}