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
    if( Auth::user()->rol === "admin"){
        return redirect()->route('admin_jug');
    }else{
        return redirect()->route('editor');
    }
})->middleware('auth');

// ADMIN ROUTES
Route::get('/administrador/jugadores', 'AdminController@jugadores')->name('admin_jug')->middleware('auth');
Route::get('/administrador/verJugadores', 'AdminController@verJugadores')->middleware('auth');
Route::post('/administrador/crearJugador', 'AdminController@crearJugador')->middleware('auth');
Route::post('/administrador/editarJugador', 'AdminController@editarJugador')->middleware('auth');
Route::get('/administrador/eliminarJugadores', 'AdminController@eliminarJugadores')->middleware('auth');

Route::get('/administrador/grupos', 'AdminController@grupos')->name('admin_grup')->middleware('auth');
Route::get('/administrador/verGrupos', 'AdminController@verGrupos')->middleware('auth');
Route::get('/administrador/generarGrupos', 'AdminController@generarGrupos')->middleware('auth');
Route::get('/administrador/eliminarGrupos', 'AdminController@eliminarGrupos')->middleware('auth');

Route::get('/administrador/partidos', 'AdminController@partidos')->name('admin_part')->middleware('auth');
Route::get('/administrador/verPartidos', 'AdminController@verPartidos')->middleware('auth');
Route::get('/administrador/generarPartidos', 'AdminController@generarPartidos')->middleware('auth');
Route::get('/administrador/eliminarPartidos', 'AdminController@eliminarPartidos')->middleware('auth');
Route::post('/administrador/asignarEditores', 'AdminController@asignarEditores')->middleware('auth');

// EDITOR ROUTES
Route::get('/editor', 'EditorController@obtenerPartidos')->name('editor')->middleware('auth');
Route::post('/editor/editarPartido', 'EditorController@editarPartido')->middleware('auth');

Auth::routes();