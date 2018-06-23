<?php

namespace App\Http\Controllers;

use App\Partidos;
use App\Mazos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller {

    public function obtenerPartidos() {
        $partidos = Partidos::where('editor', '=', Auth::user()->name)->get();
        if (sizeof($partidos) === 0) {
            return view('editor', ["cod" => "FAIL", 'msg' => "No hay partidos para editar."]);
        }
        $mazos = Array();
        for ($i = 0; $i < sizeof($partidos); $i++) {
            $jug1 = $partidos[$i]->jugador1;
            $jug2 = $partidos[$i]->jugador2;
            if (!in_array($jug1, $mazos)) {
                $m1 = Mazos::where('nombre', '=', ($jug1 . "1"))->get();
                $m2 = Mazos::where('nombre', '=', ($jug1 . "2"))->get();
                $m3 = Mazos::where('nombre', '=', ($jug1 . "3"))->get();
                $mazos[$jug1] = Array($m1[0]->clase, $m2[0]->clase, $m3[0]->clase);
            }
            if (!in_array($jug2, $mazos)) {
                $m1 = Mazos::where('nombre', '=', ($jug2 . "1"))->get();
                $m2 = Mazos::where('nombre', '=', ($jug2 . "2"))->get();
                $m3 = Mazos::where('nombre', '=', ($jug2 . "3"))->get();
                $mazos[$jug2] = Array($m1[0]->clase, $m2[0]->clase, $m3[0]->clase);
            }
        }
        return view('editor', ["cod" => "OK", 'msg' => "Partidos asignados para editar:", 'partidos' => $partidos, 'mazos' => $mazos]);
    }

    public function editarPartido(Request $parametros) {
        $partido = Partidos::where('id', '=', $parametros->id)->get();
        $parRounds = $parametros->rounds;
        $newRounds = Array();

        for ($i = 0; $i < sizeof($parRounds); $i++) {
            $gan = "";
            $mgan = "";
            $mper = "";
            if ($parRounds[$i]['ganador'] === "Seleccionar...") {
                $gan = "-";
                if (($parRounds[$i]['mazoG'] !== "Seleccionar...")||($parRounds[$i]['mazoP'] !== "Seleccionar...")){
                    return Array("cod" => "FAIL", 'msg' => "Si el round " . ($i + 1) . " fue jugado, se debe indicar un ganador antes de seleccionar los mazos. No se modificaron los datos del partido.");
                }
            }
            if ($parRounds[$i]['ganador'] === "1") {
                $gan = $partido[0]->jugador1;
                if (($parRounds[$i]['mazoG'] === "21") || ($parRounds[$i]['mazoG'] === "22") || ($parRounds[$i]['mazoG'] === "23")) {
                    return Array("cod" => "FAIL", 'msg' => "Mazo ganador seleccionado en round " . ($i + 1) . " no corresponde al jugador seleccionado como ganador. No se modificaron los datos del partido.");
                }
                if (($parRounds[$i]['mazoP'] === "11") || ($parRounds[$i]['mazoP'] === "12") || ($parRounds[$i]['mazoP'] === "13")) {
                    return Array("cod" => "FAIL", 'msg' => "Mazo perdedor seleccionado en round " . ($i + 1) . " corresponde al jugador seleccionado como ganador. No se modificaron los datos del partido.");
                }
                if (($parRounds[$i]['mazoG'] === "Seleccionar...")||($parRounds[$i]['mazoP'] === "Seleccionar...")){
                    return Array("cod" => "FAIL", 'msg' => "Si el round " . ($i + 1) . " fue jugado, se deben indicar el mazo ganador y perdedor. No se modificaron los datos del partido.");
                }
            }
            if ($parRounds[$i]['ganador'] === "2") {
                $gan = $partido[0]->jugador2;
                if (($parRounds[$i]['mazoG'] === "11") || ($parRounds[$i]['mazoG'] === "12") || ($parRounds[$i]['mazoG'] === "13")) {
                    return Array("cod" => "FAIL", 'msg' => "Mazo ganador seleccionado en round " . ($i + 1) . " no corresponde al jugador seleccionado como ganador. No se modificaron los datos del partido.");
                }
                if (($parRounds[$i]['mazoP'] === "21") || ($parRounds[$i]['mazoP'] === "22") || ($parRounds[$i]['mazoP'] === "23")) {
                    return Array("cod" => "FAIL", 'msg' => "Mazo perdedor seleccionado en round " . ($i + 1) . " corresponde al jugador seleccionado como ganador. No se modificaron los datos del partido.");
                }
                if (($parRounds[$i]['mazoG'] === "Seleccionar...")||($parRounds[$i]['mazoP'] === "Seleccionar...")){
                    return Array("cod" => "FAIL", 'msg' => "Si el round " . ($i + 1) . " fue jugado, se deben indicar el mazo ganador y perdedor. No se modificaron los datos del partido.");
                }
            }

            if ($parRounds[$i]['mazoG'] === "11") {
                $mgan = $partido[0]->jugador1 . "1";
            }
            if ($parRounds[$i]['mazoG'] === "12") {
                $mgan = $partido[0]->jugador1 . "2";
            }
            if ($parRounds[$i]['mazoG'] === "13") {
                $mgan = $partido[0]->jugador1 . "3";
            }
            if ($parRounds[$i]['mazoG'] === "Seleccionar...") {
                $mgan = "-";
            }
            if ($parRounds[$i]['mazoP'] === "21") {
                $mper = $partido[0]->jugador2 . "1";
            }
            if ($parRounds[$i]['mazoP'] === "22") {
                $mper = $partido[0]->jugador2 . "2";
            }
            if ($parRounds[$i]['mazoP'] === "23") {
                $mper = $partido[0]->jugador2 . "3";
            }
            if ($parRounds[$i]['mazoP'] === "Seleccionar...") {
                $mper = "-";
            }
            
            $r = Array('ganador' => $gan, 'mazoG' => $mgan, 'mazoP' => $mper);
            $newRounds[] = $r;
        }

        $partido[0]->rounds = $newRounds;
        $coment = $parametros->com;
        if($coment === null){
            $partido[0]->comentario = "-";
            $coment = "-";
        }else{
            $partido[0]->comentario = $coment;
        }
        $partido[0]->save();
        return Array("cod" => "OK", 'msg' => "Partido " . $parametros->id . " editado correctamente.", 'rounds' => $newRounds, 'coment' => $coment);
    }
}