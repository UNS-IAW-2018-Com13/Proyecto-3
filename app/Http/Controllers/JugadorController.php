<?php

namespace App\Http\Controllers;

use App\Jugador;
use App\Mazo;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class JugadorController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    
    public function salvar(){
        
    }


    public function show(Request $parametros)
    {
        $jugador= new Jugador();
        $jugador->nombre = $parametros->InNombre;
        
        return view('res');
    }
}