<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function meals(){
        $meals = DB::select('SELECT name, bildname FROM gerichtes ORDER BY RAND() LIMIT 5;');
        \Illuminate\Support\Facades\Log::channel('homepage')->info('Homepage has been called.');
        return view('Homepage/news',['meals'=>$meals]);
    }
}
