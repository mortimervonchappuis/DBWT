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

    public function bewerten(){
        $beschreibung = $_POST['beschreibung'];
        $rating = $_POST['rating'];
        $gericht_id = $_POST['gericht_id'];
        $user_id = $_SESSION['user_id'];

        $query = "INSERT INTO bewertungs (gerichte_id, benutzer_id, beschreibung, highlight, sterne) VALUES (".$gericht_id.", ".$user_id.", '".$beschreibung."', false, ".$rating.");";
        DB::insert($query);
        redirect('/');
    }
}
