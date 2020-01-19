<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{user}', 'ProfileController@index')->name('profile');

Route::get('/t/debitare', 'AddingExpsController@create')->name('debitare');
Route::get('/t/creditare', 'AddingMoneyController@create')->name('creditare');
Route::get('/u/profile/{user}', 'ProfileController@update')->name('updateProfile');
Route::get('/afisare/tranzactii', 'AfisareTranzactiiController@index')->name('toAfisareListaTranzactii');
Route::get('/o/statistica', 'GenStatisticiController@ordonare')->name('statisticaOrdonare');
Route::get('/a/statistica', 'AfisareStatisticiHome@index')->name('afisareStatistica');

Route::get('/t/registrareTranzactieDebitare/{user}',  'RegisterDebitareController@register')->name('registrareDebitare');
Route::get('/t/registrareTranzactieCreditare/{user}', 'RegisterCreditareController@register')->name('registrareCreditare');
Route::get('/m/tranzactie', 'ModificareTranzactieController@modificare')->name('modificareTranzactie');

Route::get('/sDB/tranzactie', 'ModificareTranzactieController@stergereTranzactie')->name('stergereTranzactieInDB');
Route::get('/mDB/tranzactie', 'ModificareTranzactieController@modificareTranzactie')->name('modificareTranzactieInDB');

Route::get('statistici', 'AfisareStatisticiHome@index');


