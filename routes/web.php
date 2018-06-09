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
	return view('login');
});

Route::get('/administrador', function () {
    return view('administrador');
});

Route::get('/editor', function () {
    return view('editor');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/addJugador',  function () {
    return view('res');});