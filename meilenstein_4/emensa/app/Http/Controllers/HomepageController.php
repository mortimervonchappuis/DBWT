<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Log;

class HomepageController extends Controller
{
    public function meals(){
        $meals = DB::select('SELECT name, bildname, id FROM gerichtes ORDER BY RAND() LIMIT 5;');
        Log::channel('homepage')->info('Homepage has been called.');
        $bewertungen = DB::select('SELECT bewertungs.highlight, bewertungs.id, gerichtes.bildname, bewertungs.beschreibung, bewertungs.sterne, benutzers.E_Mail, gerichtes.name FROM bewertungs JOIN benutzers ON bewertungs.benutzer_id = benutzers.id JOIN gerichtes ON bewertungs.gerichte_id = gerichtes.id WHERE bewertungs.highlight = 1 ORDER BY bewertungs.created_at DESC;');
        return view('Homepage/news',['meals'=>$meals, 'bewertungen'=>$bewertungen]);
    }
}
