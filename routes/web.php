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

Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/cars', 'PrzedsiebiorcaController@cars')->name('cars');
Route::patch('/przedsiebiorca/pojazdy/wycofaj/{id}', 'WykazPojController@wycofaj')->name('wycofaj');
Route::patch('/przedsiebiorca/{id}/dokument/{nr_dok}/wypisy/depozyt/', 'WypisyController@depozyt')->name('depozyt');
Route::patch('/przedsiebiorca/{id}/dokument/{nr_dok}/wypisy/depozytwyd/', 'WypisyController@depozytwyd')->name('depozytwyd');
Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/wypisy/', 'WypisyController@index')->name('index');
Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/wypisy/edit', 'WypisyController@update')->name('update');

Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/pdf/', 'PrzedsiebiorcaController@gPDF');
Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/wypisyPDF/', 'WypisyController@wypisyPDF');
Route::get('/przedsiebiorca/zabezpieczenie/stare', 'PrzedsiebiorcaController@stare_zf')->name('stare_zf');

Route::get('/search', 'PrzedsiebiorcaController@search');
Route::get('/przedsiebiorca/{id}/zmiany/{nr_dok}', 'ZmianyPrzedController@index')->name('index');
Route::get('/przedsiebiorca/baza/stare', 'PrzedsiebiorcaController@stare_bz')->name('stare_bz');
Route::get('/przedsiebiorca/zarzadzajacy/stare', 'PrzedsiebiorcaController@stare_oz')->name('stare_oz');

Route::get('/przedsiebiorca/pisma/print_zdol_finans/{id}', 'PismaController@print_zdol_finans');
Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/pisma/zabezpieczenie/tresc/', 'PismaController@tresc');
Route::post('/przedsiebiorca/pisma/podglad/{id}', 'PismaController@pismo_gotowe')->name('pismo_gotowe');
Route::get('/przedsiebiorca/pisma/zf_pdf/{id}', 'PismaController@zf_pdf');
Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/pisma/zarzadzajacy/tresc/', 'PismaController@pismo_zarzadzajacy')->name('pismo_zarzadzajacy');
Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/pisma/zarzadzajacy/printPDF/', 'PismaController@print_zarzadzajacy')->name('print_zarzadzajacy');

Route::get('/przedsiebiorca/zdarzenia', 'PrzedsiebiorcaController@zdarzenia');
Route::patch('/przedsiebiorca/{id}/dokument/{nr_dok}/zawies/', 'PrzedsiebiorcaController@zawies')->name('zawies');
Route::patch('/przedsiebiorca/{id}/dokument/{nr_dok}/odwies/', 'PrzedsiebiorcaController@odwies')->name('odwies');
Route::patch('/przedsiebiorca/{id}/dokument/{nr_dok}/rezygnacja/', 'PrzedsiebiorcaController@rezygnacja')->name('rezygnacja');

Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}', 'PrzedsiebiorcaController@show')->name('show');

Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/edit/', 'PrzedsiebiorcaController@edit');

Route::post('destroy/{id}', 'WypisyController@destroy');

Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/kontrole/edit/', 'kontrole\Kontrole@edit');

Route::resource('kontrole', 'kontrole\Kontrole');
Route::resource('raporty', 'raporty\Raporty');

Route::resource('przedsiebiorca/zmiany', 'ZmianyPrzedController');

Route::resource('przedsiebiorca/baza', 'BazaController');

Route::resource('przedsiebiorca/dokumenty', 'DokPrzedController');

Route::resource('przedsiebiorca/zarzadzajacy', 'CertController');

Route::resource('przedsiebiorca/zabezpieczenie', 'ZdolnoscController');

Route::resource('przedsiebiorca/wypisy', 'WypisyController');

Route::resource('przedsiebiorca/pojazdy', 'WykazPojController');

Route::resource('przedsiebiorca', 'PrzedsiebiorcaController');

// Routing - OSK

Route::resource('osk', 'osk\OskController');

// Routing - SKP

Route::resource('skp', 'skp\SkpController');
