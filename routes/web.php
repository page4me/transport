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

Route::get('/przedsiebiorca/pdf/{id}', 'PrzedsiebiorcaController@gPDF');


Route::resource('przedsiebiorca/baza', 'BazaController');

Route::resource('przedsiebiorca/dokumenty', 'DokPrzedController');

Route::resource('przedsiebiorca', 'PrzedsiebiorcaController');
