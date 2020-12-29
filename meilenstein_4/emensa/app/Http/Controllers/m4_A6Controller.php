<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class m4_A6Controller extends Controller
{
    public function show (Request $request){
        $param = $request->input();
        return view('examples/m4_6a_queryparameter',);
    }

    public function showKategorie(){

        $names =DB::table('kategorie')->orderBy('name','asc')->get();
        return view('examples/m4_6b_kategorie',['names'=>$names]);
    }

    public function showGericht(){
        $gerichte = DB::table('gericht')->where('preis_intern','>','2')->orderByDesc('name')->get();

        return view('examples/m4_6c_gerichte',['gerichte' => $gerichte]);
    }

    public function showPage(Request $request){

        $choice = $request->input('no','1');
        if ($choice == '1')
            return view('examples/m4_6d_page_1',[$choice]);
        elseif ($choice == '2')
            return view('examples/m4_6d_page_2',[$choice]);

    }

}
