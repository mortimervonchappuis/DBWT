<?php

namespace App\Http\Controllers;

use App\Models\gericht_hat_allergen;
use App\Models\Gerichte;
use Illuminate\Support\Facades\DB;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class EmensaController extends Controller
{

    public function indexGerichte()
    {

        $mealList = DB::select("SELECT g.name, g.preis_intern, g.preis_extern, GROUP_CONCAT(gha.code) as gha_code FROM gerichtes as g JOIN gericht_hat_allergens AS gha ON gha.gericht_id = g.id GROUP BY g.id ;");

        return view('Homepage/meals',['mealList'=>$mealList]);
    }

    public function indexSuppen()
    {
        $soupList = Gerichte::query()->where('name','LIKE','%suppe%')->get();
        return view('mealfilter.souplist',['soupList'=>$soupList]);
    }

    private function logger(){
    // create a log channel
    $log = new Logger('name');
    $log->pushHandler(new StreamHandler('storage.logs.test.log', Logger::WARNING));

    // add records to the log
    $log->warning('Foo');
    $log->error('Bar');


    }

}
