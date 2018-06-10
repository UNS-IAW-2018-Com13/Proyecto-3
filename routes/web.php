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

Route::get('/administrador', function () {
    return view('administrador');
});

Route::get('/editor', function () {
    return view('editor');
});

Route::get('/', function () {
    if( Auth::user()->name==="admin"){
        return view('administrador');
    }else{
        return view('editor');
    }
})->middleware('auth');

Route::post('/addJugador','AdminController@crearJugador')->middleware('auth');

Route::get('/generarGrupos','AdminController@generarGrupos')->middleware('auth');

Auth::routes();