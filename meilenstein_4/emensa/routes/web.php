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

Route::view('/','Homepage/news');
Route::view('/contact','Homepage/contact');
// Route::post('/contact','\App\Http\Controllers\EmensaController@storeNewsletter');
Route::view('/about','Homepage/about');
Route::get('/meals','App\Http\Controllers\EmensaController@indexGerichte');
Route::view('/login', 'Homepage/anmeldung');
Route::post('/verify', 'App\Http\Controllers\LoginController@login');
// Route::get('/verify', 'App\Http\Controllers\LoginController@login');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout');
