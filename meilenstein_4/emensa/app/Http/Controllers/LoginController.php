<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use MongoDB\Driver\Session;

class LoginController extends Controller
{
    public function signup(){
        $user = $_POST['e-mail'];
        $password = $_POST['password'];
        $result = DB::select('SELECT * FROM benutzers WHERE E_Mail = "'.$user.'" AND `password` = "'.$this->sha3($password).'";');
        if (!$result){
            DB::beginTransaction();
            $query = 'INSERT INTO benutzers(E_Mail, password, admin, anzahl_fehler, anzahl_anmeldungen) VALUES ("'.$user.'", "'.$this->sha3($password).'", false, 0, 0);';
            DB::insert($query);
            $query = 'SELECT id, admin FROM benutzers WHERE E_Mail = "'.$user.'";';
            $result = DB::select($query)[0];
            $id = $result->id;
            $admin = $result->admin;
            DB::commit();
            $this->set_cookie($user, $id, $admin);
            return redirect('/');
        }
        else{
            return redirect('/register?fail=true');
        }
    }

    public function sha3($password){
        $algo = 'sha3-512';
        $salt = '1917 red october';
        return hash_hmac($algo, $password, $salt);
    }

    public function login(){
        $user = $_POST['e-mail'];
        $password = $_POST['password'];
        $result = DB::select('SELECT * FROM benutzers WHERE E_Mail = "'.$user.'" AND `password` = "'.$this->sha3($password).'";')[0];
        if ($result){
            $id = $result->id;
            $admin = $result->admin;
            $this->set_cookie($user, $id, $admin);
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
        unset($_SESSION['user_id']);
        unset($_SESSION['admin']);
        session_destroy();
        return redirect('/');
    }


    private function set_cookie($user, $id, $admin){
        $_SESSION['user'] = $user;
        $_SESSION['user_id'] = $id;
        $_SESSION['admin'] = $admin;
        DB::beginTransaction();
        DB::update('UPDATE benutzers SET anzahl_anmeldungen = anzahl_anmeldungen + 1, letzte_anmeldung = NOW() WHERE E_Mail = "'.$user.'";');
        DB::commit();
        Log::channel('login')->info('Login success',['email' => $user]);
    }
}
