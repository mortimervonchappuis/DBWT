<?php
print_r($_POST);
//global pseudo_db datei
const postfile = 'pseudo_db.txt';
//leere variablen
$name_error = $email_error = $datenschutz_error = "";
$name = $email ="";

//post validation
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (empty($_POST["name"]))
    { $name_error = "<br>Das Namensfeld darf nicht leer sein!";}
    else {
        $name = test_input($_POST["name"]);
        //Check ob der name nur Buchstaben und space benutzt (gefunden auf Stackoverflow)

        if (!preg_match("/^[a-zA-Z ]*$/", $name))
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
        else if (strpos($email,"trashmail.de"))
            {$email_error = "<br>E-Mail enthält nicht erlaubte domain!";}
        else if (strpos($email,"trashmail.com"))
            {$email_error = "<br>E-Mail enthält nicht erlaubte domain!";}
    }


    if (!isset($_POST["datenschutz"])){
        $datenschutz_error= "Die Box muss angekreuzt sein!";}




    
}

function login_post($name,$email,$language){

    file(fopen(postfile,a)) or die("Datei existiert nicht!");
    $login_string = $name.";".$email.";".$language.'<br>';
    fwrite(postfile,$login_string);
    fclose(postfile);

}

//soll alle unnötigen zeichen entfernen um einen cleanen string draus zu machen
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
