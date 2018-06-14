@extends('layouts.app')

@section('content')
<br/>
<br/>
<div class="container">
    <div class="container-fluid" id="divMensajes">

    </div>
    <div class="container-fluid" id="divResultados">

    </div>
    <div class="container-fluid">
        <button class="btn btn-primary" onclick="verGrupos('divMensajes', 'divResultados');">Ver Grupos</button>
        <button class="btn btn-primary" onclick="generarGrupos('divMensajes', 'divResultados');">Generar Grupos</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaConfirmacion"
                onclick="modalAdvertenciaGruposAdmin('divMensajes', 'divResultados');">Eliminar Grupos</button>
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
                    <h5>Estas a punto de borrar todos los grupos del partido!</h5>
                    <h5>Estas seguro que queres hacer esto?</h5>
                </div>
                <br/>
                <div class="container">                    
                    <button id="botonConfirmar" aria-label="Close" class="btn btn-primary"
                            data-dismiss="modal">SI! Borremos los grupos!</button>
                    <button id="botonCancelar" aria-label="Close" class="btn btn-primary"
                            data-dismiss="modal">Nop, no borremos nada!</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
