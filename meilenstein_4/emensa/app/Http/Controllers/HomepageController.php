<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Log;

class HomepageController extends Controller
{
    public function meals(){
        $meals = DB::select('SELECT name, bildname, id FROM gerichtes ORDER BY RAND() LIMIT 5;');
        Log::channel('homepage')->info('Homepage has been called.');
        return view('Homepage/news',['meals'=>$meals]);
    }
}
