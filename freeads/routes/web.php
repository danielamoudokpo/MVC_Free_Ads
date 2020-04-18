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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','IndexController@showIndex');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/home/modify', 'HomeController@modify')->name('user.modify');

Route::post('/home/modify', 'userController@update');


// Route::get('/Annonce/index', 'AnnonceController@index');

// Route::get('/Annonce.update', 'AnnonceController@update');


Route::get('/Annonce/search', 'AnnonceController@search')->name('Annonce.search');

Route::post('/Annonce/search', 'AnnonceController@search')->name('Annonce.search');


Route::resource('Annonce','AnnonceController');




// Route::resource('user','userController');
