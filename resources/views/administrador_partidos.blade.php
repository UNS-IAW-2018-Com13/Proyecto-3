@extends('layouts.app')

@section('content')
<br/>
<br/>
<div class="container">
    <div class="container-fluid" id="divMensajes">
        @if ($msg !== "ok")
        {{ $msg }}
        @endif
    </div>
    <div class="container-fluid" id="divResultados">

    </div>
    <div class="container-fluid">
        <button class="btn btn-primary" onclick="verPartidos('divMensajes', 'divResultados');">Ver Partidos</button>
        <button class="btn btn-primary" onclick="generarPartidos('divMensajes', 'divResultados');">Generar Partidos</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaConfirmacion"
                onclick="modalAdvertenciaPartidosAdmin('divMensajes', 'divResultados');">Eliminar Partidos</button>
    </div>
</div>

<div class="modal fade" id="ventanaPartido" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" 
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="ventanaTitulo">
                <h5 class="modal-title" id="tituloVentana">PARTIDO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ventanaCuerpo">                        
                <div class="container">
                    </div>
                    <div class="form-group">
                        <label>Fecha</label>
                        <input id="textFecha" type="date" class="form-control" name="textFecha" value="2018-01-01">
                    </div>
                    <div class="form-group">
                        <label>Hora</label>
                        <input id="textHora" type="time" class="form-control" name="textHora" value="00:00">
                    </div>
                    <div class="form-group">
                        <label>Editor</label>
                        <select class="custom-select" id="selectEditor">
                            <option selected>Seleccionar...</option>
                            @for ($i = 0; $i < sizeof($editores); $i++)
                            <option value="{{$editores[$i]}}">{{$editores[$i]}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="container">
                        <button id="botonModal" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ventanaConfirmacion" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="ventanaTitulo">
                <h5 class="modal-title" id="tituloVentana">ADVERTENCIA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ventanaCuerpo">
                <div class="container">
                    <h4>CUIDADO!</h5>
                        <h5>Estas a punto de borrar todos los partidos del torneo!</h5>
                        <h5>Estas seguro que queres hacer esto?</h5>
                </div>
                <br/>
                <div class="container">                    
                    <button id="botonConfirmar" aria-label="Close" class="btn btn-primary"
                            data-dismiss="modal">SI! Borremos los partidos!</button>
                    <button id="botonCancelar" aria-label="Close" class="btn btn-primary"
                            data-dismiss="modal">Nop, no borremos nada!</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
