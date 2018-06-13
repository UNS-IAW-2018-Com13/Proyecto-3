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

// LOGIN ROUTE
Route::get('/', function () {
    if( Auth::user()->name === "admin"){
        return redirect()->route('administrador');
    }else{
        return redirect()->route('editor');
    }
})->middleware('auth');

// ADMIN ROUTES
Route::get('/administrador', 'AdminController@inicio')->name('administrador')->middleware('auth');

Route::post('/addJugador', 'AdminController@crearJugador')->middleware('auth');

Route::get('/generarGrupos', 'AdminController@generarGrupos')->middleware('auth');

Route::get('/generarPartidos', 'AdminController@generarPartidos')->middleware('auth');

Route::post('/asignarEditores', 'AdminController@asignarEditores')->middleware('auth');

// EDITOR ROUTES
Route::get('/editor', 'EditorController@obtenerPartidos')->name('editor')->middleware('auth');

Route::post('/editor/editarPartido', 'EditorController@editarPartido')->middleware('auth');

Auth::routes();