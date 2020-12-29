<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class EmensaController extends Controller
{

    public function indexGerichte()
    {
        $mealList = DB::select("SELECT g.name, g.preis_intern, g.preis_extern, GROUP_CONCAT(gha.code) as gha_code FROM gericht as g JOIN gericht_hat_allergen AS gha ON gha.gericht_id = g.id GROUP BY g.id;");
        return view('Homepage/meals',['mealList'=>$mealList]);
    }
}
