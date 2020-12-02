

<?php
/**
 * Praktikum DBWT. Autoren:
 * Dominik, Bien, 3149135
 * Botho Karl Mortimer, von Chappuis, 3146023
 * Date: 11/19/20
 * Time: 15:00 PM
 */

$name_status = 'unchecked';
$email_status = 'unchecked';

const GET_SORTED_BY = 'sorter';
const GET_PARAM_SEARCHTEXT = 'searchtext';

if (!isset($_GET[GET_SORTED_BY])){
    $_GET[GET_SORTED_BY] = "name";
}

/**
 * convert csv to array of arrays
 */
$filename = "pseudo_db.csv";
$keys  = ['name','email','sprache'];
$file = fopen($filename,'r');
$datainput = [];
while(!feof($file)){
    $line = explode(";",fgets($file));
    for ($i = 0; $i < sizeof($keys); $i++){
        $array[$keys[$i]] = $line[$i];
    }
    array_push($datainput, $array);
}


/**
 * search function with case insensitivity
 */
$showUserData = [];
if (!empty($_GET[GET_PARAM_SEARCHTEXT])) {
    $searchterm = $_GET[GET_PARAM_SEARCHTEXT];
    foreach ($datainput as $userdata) {
        if (stripos($userdata['name'],$searchterm) !== false){
            $showUserData[] = $userdata;
        }
    }
}
else{
    $showUserData = $datainput;
}


/**
 * compares 2 strings with a natural order algorythm
 * @param $a
 * @param $b
 * @return int for position determination
 */
function compareName($a, $b){
    return strnatcmp($a['name'], $b['name']);
}

function compareMail($a,$b){
    return strnatcmp($a['email'], $b['email']);
}


/**
 * sort on checked radio box. if not set default is name
 */
if ($_GET[GET_SORTED_BY] == 'name'){
    usort($showUserData,'compareName');
    $name_status = 'checked';

}
elseif ($_GET[GET_SORTED_BY] == 'email'){
    usort($showUserData,'compareMail');
    $email_status = 'checked';
}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                         <meta http-equiv="X-UA-Compatible" content="ie=edge">
             <title>nl-admin</title>

    <style>

    </style>
</head>
<body>

<form action="" method="get">
    <label for="name">Sortiere nach: </label><br>
    <label for="name">Name:</label>
    <input type="radio" id="name" name="sorter" value="name" <?PHP print $name_status; ?> required >
    <label for="email">E-mail:</label>
    <input type="radio" id="email" name="sorter" value="email" <?PHP print $email_status; ?> required > <br><br>
    <label for="searchtext">Text zum Filtern: </label><br>
    <input type="text" id="searchtext" name="searchtext"><br>
    <input type="submit" value="submit">
</form>


<?php
echo "
    <table>
            <thead>
                <tr>
                    <td>Name</td>
                    <td>E-Mail</td>
                    <td>Sprache</td>
                    <td>Datenschutzglesen</td>
                </tr>
            </thead>
            <tbody>
            <br>
            <br>
";

foreach ($showUserData as $filedata){
    echo "
    <tr>
        <td class='name'>".$filedata['name']."</td>
        <td class='email'>".$filedata['email']."</td>
        <td class='sprache'>".$filedata['sprache']."</td>
        <td>x</td>
    </tr>
    ";
}

echo "
    </tbody>
</table>";

?>

</body>
</html>