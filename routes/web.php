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

Route::get('/przedsiebiorca/cars/{id}', 'PrzedsiebiorcaController@cars')->name('cars');
Route::patch('/przedsiebiorca/pojazdy/wycofaj/{id}', 'WykazPojController@wycofaj')->name('wycofaj');
Route::get('/przedsiebiorca/wypisy/{id}', 'WypisyController@index')->name('index');

Route::get('/przedsiebiorca/pdf/{id}', 'PrzedsiebiorcaController@gPDF');
Route::get('/przedsiebiorca/wypisyPDF/{id}', 'WypisyController@wypisyPDF');

Route::resource('przedsiebiorca/baza', 'BazaController');

Route::resource('przedsiebiorca/dokumenty', 'DokPrzedController');

Route::resource('przedsiebiorca/zarzadzajacy', 'CertController');

Route::resource('przedsiebiorca/zabezpieczenie', 'ZdolnoscController');

Route::resource('przedsiebiorca/wypisy', 'WypisyController');

Route::resource('przedsiebiorca/pojazdy', 'WykazPojController');

Route::resource('przedsiebiorca', 'PrzedsiebiorcaController');
