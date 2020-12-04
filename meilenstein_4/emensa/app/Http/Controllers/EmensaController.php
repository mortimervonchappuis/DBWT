<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmensaController extends Controller
{

    public function indexGerichte()
    {
        // TODO: Implement indexGerichte() method.
        $mealList = DB::table('gericht')->where('preis_intern','>','2')->orderByDesc('preis_intern')->get();

        return view('Homepage/meals',['mealList'=>$mealList]);
    }


}
