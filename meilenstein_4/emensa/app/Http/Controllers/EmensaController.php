<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmensaController extends Controller
{

    public function indexGerichte()
    {
        // TODO: Implement indexGerichte() method.
        $mealList = DB::table('gericht_hat_allergen')
                            ->leftJoin('allergen', 'gericht_hat_allergen.code','=','allergen.code')
                            ->rightJoin('gericht','gericht.id','=','gericht_hat_allergen.gericht_id')
                            ->groupBy('gericht.name')->get();


        return view('Homepage/meals',['mealList'=>$mealList]);
    }

    public function storeNewsletter(){

    //leere variablen
    $filename_db = "pseudo_db.csv";
    $name_error = $email_error = $datenschutz_error = "";
    $name = $email ="";

    function number_of_newsletter_subscribers(){
        global $filename_db;
        $subscriber = 0;
        $file = fopen($filename_db, 'r');
        while (!feof($file)){
            if (fgets($file)){
                $subscriber++;
            }
        }
        fclose($file);
        return $subscriber;
    }

    echo number_of_newsletter_subscribers();

    //post validation
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if (empty($_POST["name"]))
        { $name_error = "<br>Das Namensfeld darf nicht leer sein!";}
        else {
            $name = test_input($_POST["name"]);
            //Check ob der name nur Buchstaben und space benutzt (gefunden auf Stackoverflow)

            if (!preg_match("/^[a-zA-Z][a-zA-Z ]*$/", $name))
            {  $name_error = "<br>Nur Buchstaben und Leertaste erlaubt!";}
        }


        if (empty($_POST["email"])){
            $email_error = "<br>Es muss eine E-Mail eingetragen sein!";}
        else
        {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {$email_error = "<br>Keine gültige E-Mail!";}
            else if (strpos($email,"rcpt.at"))
            {$email_error = "<br>E-Mail enthält nicht erlaubte domain!";}
            else if (strpos($email,"damnthespam.at"))
            {$email_error = "<br>E-Mail enthält nicht erlaubte domain!";}
            else if (strpos($email,"wegwerfmail.de"))
            {$email_error = "<br>E-Mail enthält nicht erlaubte domain!";}
            else if (strpos($email,"@trashmail."))
            {$email_error = "<br>E-Mail enthält nicht erlaubte domain!";}

        }

        if (!isset($_POST["datenschutz"])){
            $datenschutz_error= "Die Box muss angekreuzt sein!";}

        if ($name_error =="" and $email_error == "" and $datenschutz_error == "")
        {login_post($name,$email,$_POST["language"]);}
    }

    function login_post($name,$email,$language){
        global $filename_db;
        $db = fopen($filename_db,"a");
        $login_string = $name.";".$email.";".$language."
    ";
        fwrite($db,$login_string);
        fclose($db);

    }


    //soll alle unnötigen zeichen entfernen um einen cleanen string draus zu machen
    function test_input($data) {
        $data = trim($data); // schneidet leerzeichen und tabs am anfang und ende des strings ab
        $data = stripslashes($data); // selbsterklärend
        $data = htmlspecialchars($data); // html character substitution
        return $data;
    }

    }

}
