<?php

namespace App\Http\Controllers;

use App\Jugadores;
use App\Mazos;
use App\Grupos;
use App\Partidos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function jugadores() {
        return view('administrador_jugadores');
    }

    public function verJugadores() {
        $jugadores = Jugadores::all();
        if (sizeof($jugadores) > 0) {
            $mazos = Mazos::all();
            $m1 = "";
            $m2 = "";
            $m3 = "";
            for ($i = 0; $i < sizeof($jugadores); $i++) {
                for ($j = 0; $j < sizeof($mazos); $j++) {
                    if ($mazos[$j]->nombre === ($jugadores[$i]->nombre . "1")) {
                        $m1 = $mazos[$j]->clase;
                    }
                    if ($mazos[$j]->nombre === ($jugadores[$i]->nombre . "2")) {
                        $m2 = $mazos[$j]->clase;
                    }
                    if ($mazos[$j]->nombre === ($jugadores[$i]->nombre . "3")) {
                        $m3 = $mazos[$j]->clase;
                    }
                }
                $jugadores[$i]->mazos = Array($m1, $m2, $m3);
            }
            $res = Array("cod" => "OK", "msg" => "Jugadores existentes:", "jugadores" => $jugadores);
            return $res;
        } else {
            $res = Array("cod" => "FAIL", "msg" => "No hay jugadores cargados.");
            return $res;
        }
    }

    public function crearJugador(Request $parametros) {
        $jugador = Jugadores::where('nombre', '=', $parametros->nombre)->get();
        if (sizeof($jugador) == 0) {
            $jugador = new Jugadores();
            $jugador->nombre = $parametros->nombre;
            $jugador->puntaje = 0;
            $jugador->idFavorito = sizeof(Jugadores::all());
            $jugador->favorito = 0;
            $jugador->mazos = [$parametros->nombre . "1", $parametros->nombre . "2", $parametros->nombre . "3"];
            
            //$avatar = $parametros->avatar;

            $mazo1 = new Mazos();
            $mazo1->nombre = $parametros->nombre . "1";
            $mazo1->clase = $parametros->mazo1;
            $mazo1->cartas = [["carta", 1]];
            $mazo1->save();

            $mazo2 = new Mazos();
            $mazo2->nombre = $parametros->nombre . "2";
            $mazo2->clase = $parametros->mazo2;
            $mazo2->cartas = [["carta", 1]];
            $mazo2->save();

            $mazo3 = new Mazos();
            $mazo3->nombre = $parametros->nombre . "3";
            $mazo3->clase = $parametros->mazo3;
            $mazo3->cartas = [["carta", 1]];
            $mazo3->save();

            $jugador->save();

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

            $res = Array("cod" => "OK", "msg" => "Jugador y mazos creados correctamente.");
            return $res;
        }
        $res = Array("cod" => "FAIL", "msg" => "Jugador previamente cargado.");
        return $res;
    }
    
    public function eliminarUltimoJugador() {
        $idFav = sizeof(Jugadores::all());
        if($idFav === 16){
            $res = Array("cod" => "FAIL", "msg" => "No se puede eliminar este jugador en este momento.");
            return $res;
        }
        
        $jugador = Jugadores::where('idFavorito', '=', ($idFav - 1))->get();
        $m1 = Mazos::where('nombre', '=', ($jugador[0]->nombre . "1"))->get();
        $m2 = Mazos::where('nombre', '=', ($jugador[0]->nombre . "2"))->get();
        $m3 = Mazos::where('nombre', '=', ($jugador[0]->nombre . "3"))->get();
        
        $nombreJ = $jugador[0]->nombre;
        
        $jugador[0]->delete();
        $m1[0]->delete();
        $m2[0]->delete();
        $m3[0]->delete();
        
        $res = Array("cod" => "OK", "msg" => "El jugador " . $nombreJ . " y sus mazos fueron eliminados correctamente.");
        return $res;
    }
    
    public function eliminarJugadores() {
        $res = Array("cod" => "FAIL", "msg" => "No se pueden eliminar los jugadores en este momento.");
        return $res;
    }

    public function grupos() {
        return view('administrador_grupos');
    }

    public function verGrupos() {
        $grupos = Grupos::all();
        if (sizeof($grupos) > 0) {
            $res = Array("cod" => "OK", "msg" => "Grupos existentes:", "grupos" => $grupos);
            return $res;
        } else {
            $res = Array("cod" => "FAIL", "msg" => "No hay grupos cargados.");
            return $res;
        }
    }

    public function generarGrupos() {
        $grupos = Grupos::all();
        if (sizeof($grupos) > 0) {
            $resultado = Array("cod" => "GCP", "msg" => "Grupos previamente creados.", "grupos" => $grupos);
            return $resultado;
        } else {
            $jugadores = Jugadores::all();
            if (sizeof($jugadores) !== 16) {
                $resultado = Array("cod" => "FJ", "msg" => "Tiene que haber 16 jugadores cargados para poder crear los grupos (ni mas, ni menos).");
                return $resultado;
            }
            $grupos = Array(new Grupos(), new Grupos(), new Grupos(), new Grupos());

            $grupos[0]->nombre = "A";
            $grupos[0]->integrantes = Array();
            $grupos[1]->nombre = "B";
            $grupos[1]->integrantes = Array();
            $grupos[2]->nombre = "C";
            $grupos[2]->integrantes = Array();
            $grupos[3]->nombre = "D";
            $grupos[3]->integrantes = Array();

            $aux;
            for ($i = 0; $i < sizeof($jugadores); $i++) {
                $aux = $grupos[$i % 4]->integrantes;
                $aux[] = $jugadores[$i]->nombre;
                $grupos[$i % 4]->integrantes = $aux;
            }

            for ($i = 0; $i < sizeof($grupos); $i++) {
                $grupos[$i]->save();
            }

            $resultado = Array("cod" => "GCC", "msg" => "Grupos correctamente creados.", "grupos" => $grupos);
            return $resultado;
        }
    }

    public function eliminarGrupos() {
        $grupos = Grupos::all();
        if (sizeof($grupos) > 0) {
            for ($i = 0; $i < sizeof($grupos); $i++) {
                $grupo = $grupos[$i];
                $grupo->delete();
            }
            return Array("msg" => "Grupos eliminados correctamente.");
        } else {
            return Array("msg" => "No hay grupos para eliminar.");
        }
    }

    public function partidos() {
        return view('administrador_partidos');
    }

    public function verPartidos() {
        $partidos = Partidos::all();
        if (sizeof($partidos) > 0) {
            $res = Array("cod" => "OK", "msg" => "Partidos existentes:", "partidos" => $partidos);
            return $res;
        } else {
            $res = Array("cod" => "FAIL", "msg" => "No hay partidos cargados.");
            return $res;
        }
    }

    public function generarPartidos() {
        $partidos = Partidos::all();
        if (sizeof($partidos) > 0) {
            $res = Array("cod" => "PPC", "msg" => "Partidos previamente generados.", "partidos" => $partidos);
            return $res;
        } else {
            $grupos = Grupos::all();
            if (sizeof($grupos) < 4) {
                $resultado = Array("cod" => "FG", "msg" => "Tienen que estar creados los grupos para poder crear los partidos.");
                return $resultado;
            }
            for ($i = 0; $i < sizeof($grupos); $i++) {
                $integ = $grupos[$i]->integrantes;
                for ($c1 = 0; $c1 < sizeof($integ); $c1++) {
                    for ($c2 = $c1 + 1; $c2 < sizeof($integ); $c2++) {
                        $partido = new Partidos();
                        $partido->id = $integ[$c1] . chr(47) . $integ[$c2];
                        $partido->fecha = "-";
                        $partido->hora = "-";
                        $partido->jugador1 = $integ[$c1];
                        $partido->jugador2 = $integ[$c2];
                        $partido->rounds = array(array("ganador" => "-",
                                "mazoG" => "-",
                                "mazoP" => "-"),
                            array("ganador" => "-",
                                "mazoG" => "-",
                                "mazoP" => "-"),
                            array("ganador" => "-",
                                "mazoG" => "-",
                                "mazoP" => "-"),
                            array("ganador" => "-",
                                "mazoG" => "-",
                                "mazoP" => "-"),
                            array("ganador" => "-",
                                "mazoG" => "-",
                                "mazoP" => "-"));
                        $partido->editor = "-";
                        $partido->comentario = "-";
                        $partido->save();
                    }
                }
            }
            $lista = Partidos::all();
            $resultado = Array("cod" => "PCC", "msg" => "Partidos generados correctamente.", "partidos" => $lista);
            return $resultado;
        }
    }

    public function eliminarPartidos() {
        $partidos = Partidos::all();
        if (sizeof($partidos) > 0) {
            for ($i = 0; $i < sizeof($partidos); $i++) {
                $partido = $partidos[$i];
                $partido->delete();
            }
            return Array("msg" => "Partidos eliminados correctamente.");
        } else {
            return Array("msg" => "No hay partidos para eliminar.");
        }
    }

    public function asignarEditores(Request $parametros) {
        $partido = Partidos::where('id', '=', $parametros->id)->get();
        if (sizeof($partido) > 0) {
            $partido[0]->fecha = $parametros->fecha;
            $partido[0]->hora = $parametros->hora;
            $partido[0]->editor = $parametros->editor;
            $partido[0]->save();
            return Array("cod" => "OK", "msg" => "Partido " . $parametros->id . " actualizado correctamente con editor asignado.");
        }
        return Array("cod" => "FAIL", "msg" => "No hay partidos para editar.");
    }

}
