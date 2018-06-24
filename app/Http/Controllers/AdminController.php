<?php

namespace App\Http\Controllers;

use App\Jugadores;
use App\Mazos;
use App\Grupos;
use App\Partidos;
use App\Imagenes;
use App\User;
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
                $img = Imagenes::where('nombre', '=', $jugadores[$i]->nombre)->get();
                $jugadores[$i]->avatar = $img[0]->imagen;
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
        $jugadores = Jugadores::all();
        if (sizeof($jugadores) === 16) {
            $res = Array("cod" => "FAIL", "msg" => "No puede haber mas de 16 jugadores en el torneo. No se creo el jugador.");
            return $res;
        }
        if (($parametros->nombre === null) || ($parametros->nombre === "")) {
            $res = Array("cod" => "FAIL", "msg" => "El nombre del jugador no puede ser vacio. No se creo el jugador.");
            return $res;
        }
        $jugador = Jugadores::where('nombre', '=', $parametros->nombre)->get();
        if (sizeof($jugador) == 0) {
            if (($parametros->mazo1 === "Seleccionar...") || ($parametros->mazo2 === "Seleccionar...") || ($parametros->mazo3 === "Seleccionar...")) {
                $res = Array("cod" => "FAIL", "msg" => "Mazo seleccionado incorrecto. No se creo el jugador.");
                return $res;
            }
            if (($parametros->mazo1 === $parametros->mazo2) || ($parametros->mazo1 === $parametros->mazo3) || ($parametros->mazo2 === $parametros->mazo3)) {
                $res = Array("cod" => "FAIL", "msg" => "Los mazos del jugador no pueden ser de clases iguales. No se modificaron los datos del jugador.");
                return $res;
            }
            $jugador = new Jugadores();
            $jugador->nombre = $parametros->nombre;
            $jugador->puntaje = 0;
            $jugador->idFavorito = sizeof(Jugadores::all());
            $jugador->favorito = 0;
            $jugador->mazos = [$parametros->nombre . "1", $parametros->nombre . "2", $parametros->nombre . "3"];

            $avatar = new Imagenes();
            $avatar->nombre = $parametros->nombre;
            $avatar->imagen = $parametros->avatar;
            $avatar->save();

            $mazo1 = new Mazos();
            $mazo1->nombre = $parametros->nombre . "1";
            $mazo1->clase = $parametros->mazo1;
            $mazo1->cartas = [];
            $mazo1->save();

            $mazo2 = new Mazos();
            $mazo2->nombre = $parametros->nombre . "2";
            $mazo2->clase = $parametros->mazo2;
            $mazo2->cartas = [];
            $mazo2->save();

            $mazo3 = new Mazos();
            $mazo3->nombre = $parametros->nombre . "3";
            $mazo3->clase = $parametros->mazo3;
            $mazo3->cartas = [];
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

    public function editarJugador(Request $parametros) {
        if (($parametros->nombre === null) || ($parametros->nombre === "")) {
            $res = Array("cod" => "FAIL", "msg" => "El nombre del jugador no puede ser vacio. No se edito el jugador.");
            return $res;
        }
        if (($parametros->mazo1 === "Seleccionar...") || ($parametros->mazo2 === "Seleccionar...") || ($parametros->mazo3 === "Seleccionar...")) {
            $res = Array("cod" => "FAIL", "msg" => "Mazo seleccionado incorrecto. No se modificaron los datos del jugador.");
            return $res;
        }
        if (($parametros->mazo1 === $parametros->mazo2) || ($parametros->mazo1 === $parametros->mazo3) || ($parametros->mazo2 === $parametros->mazo3)) {
            $res = Array("cod" => "FAIL", "msg" => "Los mazos del jugador no pueden ser de clases iguales. No se modificaron los datos del jugador.");
            return $res;
        }
        $jugador = Jugadores::where('nombre', '=', $parametros->id)->get();
        $jugador[0]->nombre = $parametros->nombre;
        $jugador[0]->puntaje = 0;
        $jugador[0]->favorito = 0;
        $jugador[0]->mazos = [$parametros->nombre . "1", $parametros->nombre . "2", $parametros->nombre . "3"];

        $avatar = Imagenes::where('nombre', '=', $parametros->id)->get();
        $avatar[0]->nombre = $parametros->nombre;
        $avatar[0]->imagen = $parametros->avatar;
        $avatar[0]->save();

        $mazo1 = Mazos::where('nombre', '=', ($parametros->id . "1"))->get();
        $mazo1[0]->nombre = $parametros->nombre . "1";
        $mazo1[0]->clase = $parametros->mazo1;
        $mazo1[0]->save();

        $mazo2 = Mazos::where('nombre', '=', ($parametros->id . "2"))->get();
        $mazo2[0]->nombre = $parametros->nombre . "2";
        $mazo2[0]->clase = $parametros->mazo2;
        $mazo2[0]->save();

        $mazo3 = Mazos::where('nombre', '=', ($parametros->id . "3"))->get();
        $mazo3[0]->nombre = $parametros->nombre . "3";
        $mazo3[0]->clase = $parametros->mazo3;
        $mazo3[0]->save();

        $jugador[0]->save();

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

        $res = Array("cod" => "OK", "msg" => "Jugador y mazos editados correctamente.");
        return $res;
    }

    public function eliminarJugadores() {
        $jugadores = Jugadores::all();
        if (sizeof($jugadores) > 0) {
            for ($i = 0; $i < sizeof($jugadores); $i++) {
                $jugador = $jugadores[$i];
                $mazo1 = Mazos::where('nombre', '=', ($jugador->nombre . "1"))->get();
                $mazo2 = Mazos::where('nombre', '=', ($jugador->nombre . "2"))->get();
                $mazo3 = Mazos::where('nombre', '=', ($jugador->nombre . "3"))->get();
                $imagen = Imagenes::where('nombre', '=', $jugador->nombre)->get();
                $imagen[0]->delete();
                $mazo1[0]->delete();
                $mazo2[0]->delete();
                $mazo3[0]->delete();
                $jugador->delete();
            }
            return Array("msg" => "Jugadores, mazos e imagenes asociadas eliminados correctamente.");
        } else {
            return Array("msg" => "No hay jugadores para eliminar.");
        }
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
                $resultado = Array("cod" => "FJ", "msg" => "Tiene que haber 16 jugadores cargados para poder crear los grupos.");
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
        $editores = User::where('rol', '=', "editor")->get();
        $edit = Array();
        if (sizeof($editores) > 0) {
            for ($i = 0; $i < sizeof($editores); $i++) {
                $edit[] = $editores[$i]->name;
            }
            return view('administrador_partidos', ['msg' => "ok", 'editores' => $edit]);
        } else {
            return view('administrador_partidos', ['msg' => "No hay editores registrados para el torneo. No se podran asignar editores a los partidos.", 'editores' => $edit]);
        }
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
            $lista = Array();
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
                        $lista[] = $partido;
                    }
                }
            }
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
            if ($parametros->fecha === null) {
                return Array("cod" => "FAIL", "msg" => "La fecha ingresada no es valida. No se realizaron cambios en el partido.");
            }
            if ($parametros->hora === null) {
                return Array("cod" => "FAIL", "msg" => "La hora ingresada no es valida. No se realizaron cambios en el partido.");
            }
            if ($parametros->editor === "Seleccionar...") {
                return Array("cod" => "FAIL", "msg" => "El editor seleccionado no es valido. No se realizaron cambios en el partido.");
            }
            $partido[0]->fecha = $parametros->fecha;
            $partido[0]->hora = $parametros->hora;
            $partido[0]->editor = $parametros->editor;
            $partido[0]->save();
            return Array("cod" => "OK", "msg" => "Partido " . $parametros->id . " actualizado correctamente. " . $parametros->editor . " asignado correctamente.");
        }
        return Array("cod" => "FAIL", "msg" => "No hay partidos para editar.");
    }

}
