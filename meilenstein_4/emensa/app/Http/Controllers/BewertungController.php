<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BewertungController extends Controller
{
    public function bewertung(){
        if (!isset($_SESSION['user'])){
            return redirect('/login');
        }
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $result = DB::select('SELECT name, bildname FROM gerichtes WHERE id = ' . $id . ';');
            if ($result)
            {
                return view('Homepage/bewertung', ['gericht' => $result[0], 'id'=>$id]);
            }
        }
        return redirect('/');
    }

    public function bewertungen(){
        $query = 'SELECT bewertungs.highlight, bewertungs.id, gerichtes.bildname, bewertungs.beschreibung, bewertungs.sterne, benutzers.E_Mail, gerichtes.name FROM bewertungs JOIN benutzers ON bewertungs.benutzer_id = benutzers.id JOIN gerichtes ON bewertungs.gerichte_id = gerichtes.id ORDER BY bewertungs.created_at DESC LIMIT 30;';
        $results = DB::select($query);
        return view('Homepage/bewertungen', ['bewertungen'=>$results]);
    }

    public function meinebewertungen(){
        if (!isset($_SESSION['user'])){
            return redirect('/');
        }
        $user = $_SESSION['user'];
        $query = 'SELECT bewertungs.highlight, bewertungs.id, gerichtes.bildname, bewertungs.beschreibung, bewertungs.sterne, benutzers.E_Mail, gerichtes.name FROM bewertungs JOIN benutzers ON bewertungs.benutzer_id = benutzers.id JOIN gerichtes ON bewertungs.gerichte_id = gerichtes.id  WHERE benutzers.E_Mail = "'.$user.'" ORDER BY bewertungs.created_at DESC;';
        $results = DB::select($query);
        return view('Homepage/bewertungen', ['bewertungen'=>$results]);
    }

    public function bewerten(){
        $beschreibung = $_POST['beschreibung'];
        $rating = $_POST['rating'];
        $gericht_id = $_POST['gericht_id'];
        $user_id = $_SESSION['user_id'];

        $query = "INSERT INTO bewertungs (gerichte_id, benutzer_id, beschreibung, highlight, sterne) VALUES (".$gericht_id.", ".$user_id.", '".$beschreibung."', false, ".$rating.");";
        DB::insert($query);
        return redirect('/');
    }

    public function delete(){
        if (!isset($_SESSION['user_id']) || !isset($_GET['id'])){
            return back();
        }
        $bewertung_id = $_GET['id'];
        $user_id = $_SESSION['user_id'];
        DB::delete("DELETE FROM bewertungs WHERE id = ".$bewertung_id." AND benutzer_id = ".$user_id.";");
        return back();
    }

    public function engrave(){
        if (!isset($_SESSION['admin']) || !isset($_GET['id']) || $_SESSION['admin'] != 1){
            return back();
        }
        $bewertung_id = $_GET['id'];
        DB::update("UPDATE bewertungs SET highlight = NOT highlight WHERE id = ".$bewertung_id.";");
        return back();
    }
}
