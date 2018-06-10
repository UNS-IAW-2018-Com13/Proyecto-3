<?php

namespace App\Http\Controllers;

use App\Jugador;
use App\Mazo;
use App\Http\Controllers\Controller;

class JugadorController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}