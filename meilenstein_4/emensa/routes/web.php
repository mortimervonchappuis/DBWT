<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
session_start();

Route::view('/name', 'examples/m4_6a_queryparameter');
Route::get('/name/{Name}', '\App\Http\Controllers\m4_A6Controller@show');
Route::get('/orderName','\App\Http\Controllers\m4_A6Controller@showKategorie');
Route::get('/gericht','\App\Http\Controllers\m4_A6Controller@showGericht');
Route::view('/gerichtOG','examples/m4_6c_gerichte');
Route::get('/page','\App\Http\Controllers\m4_A6Controller@showPage');

//Route::get('/',function (){  return view('Homepage/news');});
//Route::view('/','Homepage/news');
Route::get('/','App\Http\Controllers\HomepageController@meals');
Route::view('/contact','Homepage/contact');
//Route::post('/contact','\App\Http\Controllers\EmensaController@storeNewsletter');
Route::view('/about','Homepage/about');
Route::get('/meals','App\Http\Controllers\EmensaController@indexGerichte');
Route::get('/meals/Suppen','App\Http\Controllers\EmensaController@indexSuppen');
Route::get('/meals/User','App\Http\Controllers\EmensaController@indexUser');
Route::get('/meals/allergyList', function (){return view('mealFilter.allergyList', ['allergenList'=> \App\Models\Allergen::all()]);});

Route::view('/login', 'Homepage/anmeldung');
Route::post('/verify', 'App\Http\Controllers\LoginController@login');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout');
Route::get('/bewertung', 'App\Http\Controllers\BewertungController@bewertung');
Route::post('/bewerten', 'App\Http\Controllers\BewertungController@bewerten');
Route::post('/signup', 'App\Http\Controllers\LoginController@signup');
Route::view('/register', 'Homepage/register');
Route::get('/bewertungen', 'App\Http\Controllers\BewertungController@bewertungen');
Route::get('/meinebewertungen', 'App\Http\Controllers\BewertungController@meinebewertungen');
Route::get('/delete', 'App\Http\Controllers\BewertungController@delete');
Route::get('/engrave', 'App\Http\Controllers\BewertungController@engrave');