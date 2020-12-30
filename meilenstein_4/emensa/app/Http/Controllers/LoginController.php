<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use MongoDB\Driver\Session;

class LoginController extends Controller
{

    public function sha3($password){
        $algo = 'sha3-512';
        $salt = '1917 red october';
        return hash_hmac($algo, $password, $salt);
    }

    public function login(){
        $user = $_POST['e-mail'];
        $password = $_POST['password'];
        $result = DB::select('SELECT * FROM Benutzers WHERE E_Mail = "'.$user.'" AND `password` = "'.$this->sha3($password).'";');
        if ($result){
            $_SESSION['user'] = $user;
            DB::beginTransaction();
            DB::update('UPDATE benutzers SET anzahl_anmeldungen = anzahl_anmeldungen + 1, letzte_anmeldung = NOW() WHERE E_Mail = "'.$user.'";');
            DB::commit();
            Log::channel('login')->info('Login success',['email' => $user]);
            return redirect('/');
        }
        else{
            DB::update('UPDATE benutzers SET anzahl_fehler = anzahl_fehler + 1, letzter_fehler = NOW() WHERE E_Mail = "'.$user.'";');
            Log::channel('login')->warning('Login fail',['email' => $user]);

            return redirect('/login?fail=true');
        }
    }
    public function logout(){
        Log::channel('login')->info('Logout success',['email' => $_SESSION['user']]);
        unset($_SESSION['user']);
        session_destroy();
        return redirect('/');
    }

    public function hash(){
        $mealList = DB::select("SELECT g.name, g.preis_intern, g.preis_extern, GROUP_CONCAT(gha.code) as gha_code FROM gericht as g JOIN gericht_hat_allergen AS gha ON gha.gericht_id = g.id GROUP BY g.id;");
        return view('Homepage/meals',['mealList'=>$mealList]);
    }
}
