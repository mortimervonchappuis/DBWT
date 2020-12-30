<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function meals(){
        $meals = DB::select('SELECT name, bildname FROM gericht ORDER BY RAND() LIMIT 5;');
        return view('Homepage/news',['meals'=>$meals]);
    }
}
