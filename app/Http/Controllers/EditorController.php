<?php

namespace App\Http\Controllers;

use App\Partidos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditorController extends Controller {

    public function obtenerPartidos() {
        $partidos = Partidos::where('editor', '=', "editor")->get();
        if (sizeof($partidos) === 0) {
            return view('editor', ['msg' => "No hay partidos para editar."]);
        }
        return view('editor', ['msg' => "ok", 'partidos' => $partidos]);
    }

    public function editarPartido(Request $parametros) {
        $partido = Partidos::where('id', '=', $parametros->id)->get();
        if (sizeof($partido) === 0) {
            return array('msg' => "fail");
        }
        $partido[0]->rounds = $parametros->rounds;
        $partido[0]->comentario = $parametros->com;
        $partido[0]->save();
        return (array('msg' => "ok"));
    }

}
