<?php

namespace App\Http\Controllers;

use App\Jugador;
use App\Mazo;
use App\Grupos;
use App\Partidos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function crearJugador(Request $parametros) {
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

    public function generarGrupos() {
        $grupos = Grupos::all();
        if (sizeof($grupos) > 0) {
            $grupos = Array("msg" => "Grupos ya creados");
            return $grupos;
        } else {
            $jugadores = Jugador::all();
            if (sizeof($jugadores) < 16) {
                $jugadores = Array("msg" => "no hay suficientes jugadores");
                return $jugadores;
            } else {
                $grupos = array(new Grupos(), new Grupos(), new Grupos(), new Grupos());

                $grupos[0]->nombre = "A";
                $grupos[0]->integrantes = array();
                $grupos[1]->nombre = "B";
                $grupos[1]->integrantes = array();
                $grupos[2]->nombre = "C";
                $grupos[2]->integrantes = array();
                $grupos[3]->nombre = "D";
                $grupos[3]->integrantes = array();

                $aux;
                for ($i = 0; $i < sizeof($jugadores); $i++) {
                    $aux = $grupos[$i % 4]->integrantes;
                    $aux[] = $jugadores[$i]->nombre;
                    $grupos[$i % 4]->integrantes = $aux;
                }

                for ($i = 0; $i < sizeof($grupos); $i++) {
                    //$grupos[$i]->save();
                }
                return $grupos;
            }
        }
    }

    public function generarPartidos() {
        $partidos = Partidos::all();
        if (sizeof($partidos) === 0) {
            $partidos = Array("msg" => "Partidos ya creados");
            return $partidos;
        } else {
            $grupos = Grupos::all();
            $res = array();
            for ($i = 0; $i < sizeof($grupos); $i++) {
                $lista = array();
                $integ = $grupos[$i]->integrantes;
                for ($c1 = 0; $c1 < sizeof($integ); $c1++) {
                    for ($c2 = $c1 + 1; $c2 < sizeof($integ); $c2++) {
                        $partido = new Partidos();
                        $partido->fecha = "";
                        $partido->hora = "";
                        $partido->jugador1 = $integ[$c1];
                        $partido->mazosJugador1 = array();
                        $partido->jugador2 = $integ[$c2];
                        $partido->mazosJugador2 = array();
                        $partido->ganador = array();
                        $partido->editor = "";
                        $partido->id = $integ[$c1] . "/" . $integ[$c2];



                        $lista[] = $partido;
                    }
                }
                $res[] = array($grupos[$i]->nombre, $lista);
            }
            return $res;
        }
    }

    public function asignarEditores(Request $parametros) {
        $partido = Partidos::where('id', '=', $parametros->id)->get();
        if (sizeof($partido) > 0) {
            $partido[0]->fecha = $parametros->fecha;
            $partido[0]->hora = $parametros->hora;
            $partido[0]->editor = $parametros->editor;
            //$partido[0]->save();
            return (array('msg'=> "ok"));
        };
        return (array('msg'=> "fail"));
    }

}
