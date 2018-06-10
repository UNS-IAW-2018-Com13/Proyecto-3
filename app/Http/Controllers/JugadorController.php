<?php

namespace App\Http\Controllers;

use App\Jugador;
use App\Mazo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JugadorController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function salvar() {
        
    }

    public function show(Request $parametros) {
        $jugador = Jugador::where('nombre', '=', $parametros->InNombre)->get();
        if (sizeof($jugador) == 0) {
            $jugador = new Jugador();
            $jugador->nombre = $parametros->InNombre;
            $jugador->puntaje = 0;
            $jugador->idFavorito = sizeof(Jugador::all());
            $jugador->favorito = 0;
            $jugador->mazos = [$parametros->InNombre . "1", $parametros->InNombre . "2", $parametros->InNombre . "3"];
            /*
              $cards = explode(chr(13), $_POST['InDeck1']);
              $mazo = "{'nombre'='{$_POST['InNombre']}1',
              'clase'= '" . substr($cards[1], 10) . "',
              'mazos'= [";
              for ($i = 4; $i < sizeof($cards) - 5; $i++) {
              $mazo .= "['" . substr($cards[$i], 10) . "', " . substr($cards[$i], 3, 1) . "],";
              }
              $mazo = substr($mazo, 0, -1) . "]}";
              echo $mazo . "<br/>";
             */
        } else {
            $jugador = json_decode("{}");
            $jugador->msg = "existe";
        }


        //$jugador->save();

        return view('res', ['jugador' => $jugador]);
    }

}
