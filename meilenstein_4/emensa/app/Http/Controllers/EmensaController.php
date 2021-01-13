<?php

namespace App\Http\Controllers;

use App\Models\Allergen;
use App\Models\Benutzer;
use App\Models\gericht_hat_allergen;
use App\Models\gericht_hat_kategorie;
use App\Models\Gerichte;
use App\Models\kategorie;
use Illuminate\Support\Facades\DB;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class EmensaController extends Controller
{

    public function indexGerichte()
    {

        $mealList = DB::select("SELECT g.name, g.preis_intern, g.preis_extern, GROUP_CONCAT(gha.code) as gha_code FROM gerichtes as g JOIN gericht_hat_allergens AS gha ON gha.gericht_id = g.id GROUP BY g.id ;");

        $mealList = Gerichte::all();
        $allergenList = gericht_hat_allergen::all();

        return view('Homepage/meals',['mealList'=>$mealList,'allergenList' => $allergenList]);
    }

    public function indexSuppen()
    {
        $soupList = Gerichte::query()->where('name','LIKE','%suppe%')->get();
        return view('mealfilter.souplist',['soupList'=>$soupList]);
    }
    public function indexUser()
    {
        $userList = DB::table('benutzers')->orderBy('anzahl_anmeldungen','desc')->get();
        return view('mealfilter.userLogins',['userList'=>$userList]);
    }



}
