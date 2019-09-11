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
Route::patch('/przedsiebiorca/wypisy/depozyt/{id}', 'WypisyController@depozyt')->name('depozyt');
Route::patch('/przedsiebiorca/wypisy/depozytwyd/{id}', 'WypisyController@depozytwyd')->name('depozytwyd');
Route::get('/przedsiebiorca/wypisy/{id}', 'WypisyController@index')->name('index');

Route::get('/przedsiebiorca/pdf/{id}', 'PrzedsiebiorcaController@gPDF');
Route::get('/przedsiebiorca/wypisyPDF/{id}', 'WypisyController@wypisyPDF');
Route::get('/przedsiebiorca/zabezpieczenie/stare', 'PrzedsiebiorcaController@stare_zf')->name('stare_zf');
Route::get('/przedsiebiorca/pisma/print_zdol_finans/{id}', 'PrzedsiebiorcaController@print_zdol_finans');
Route::get('/search', 'PrzedsiebiorcaController@search');
Route::get('/przedsiebiorca/{id}/zmiany/', 'ZmianyPrzedController@index')->name('index');
Route::get('/przedsiebiorca/baza/stare', 'PrzedsiebiorcaController@stare_bz')->name('stare_bz');
Route::get('/przedsiebiorca/pisma/zf_pdf/{id}', 'PismaController@zf_pdf');


Route::resource('przedsiebiorca/zmiany', 'ZmianyPrzedController');

Route::resource('przedsiebiorca/baza', 'BazaController');

Route::resource('przedsiebiorca/dokumenty', 'DokPrzedController');

Route::resource('przedsiebiorca/zarzadzajacy', 'CertController');

Route::resource('przedsiebiorca/zabezpieczenie', 'ZdolnoscController');

Route::resource('przedsiebiorca/wypisy', 'WypisyController');

Route::resource('przedsiebiorca/pojazdy', 'WykazPojController');

Route::resource('przedsiebiorca', 'PrzedsiebiorcaController');
