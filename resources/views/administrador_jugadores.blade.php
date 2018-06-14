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
        <button class="btn btn-primary" onclick="verJugadores('divMensajes', 'divResultados');">Ver Jugadores</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaJugador">Crear Jugador</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaConfirmacionJ"
                onclick="modalAdvertenciaJugadoresAdmin('divMensajes', 'divResultados');">Eliminar Jugadores</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaConfirmacionUJ"
                onclick="modalAdvertenciaUltimoJugadorAdmin('divMensajes', 'divResultados');">Eliminar Ultimo Jugador</button>
    </div>
</div>

<div class="modal fade" id="ventanaJugador" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" 
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="ventanaTitulo">
                <h5 class="modal-title" id="tituloVentana">CREAR JUGADOR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ventanaCuerpo">                        
                <div class="container">                    
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nombre</label>
                        <input id="textNombre" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Avatar</label>
                        <input id="textAvatar" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Clase Mazo 1</label>
                        <input id="textMazo1" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Clase Mazo 2</label>
                        <input id="textMazo2" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Clase Mazo 3</label>
                        <input id="textMazo3" type="text" class="form-control">
                    </div>
                    <button id="botonModal" type="submit" aria-label="Close" 
                            class="btn btn-primary" data-dismiss="modal"
                            onclick="crearJugador('divMensajes', 'divResultados')">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ventanaConfirmacionUJ" tabindex="-1" role="dialog"
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
                        <h5>Estas a punto de borrar el ultimo jugador agregado al torneo!</h5>
                        <h5>Estas seguro que queres hacer esto?</h5>
                </div>
                <br/>
                <div class="container">                    
                    <button id="botonConfirmarUJ" aria-label="Close" class="btn btn-primary"
                            data-dismiss="modal">SI! Borremos al jugador!</button>
                    <button id="botonCancelar" aria-label="Close" class="btn btn-primary"
                            data-dismiss="modal">Nop, no borremos nada!</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ventanaConfirmacionJ" tabindex="-1" role="dialog"
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
                        <h5>Estas a punto de borrar todos los jugadores del torneo!</h5>
                        <h5>Estas seguro que queres hacer esto?</h5>
                </div>
                <br/>
                <div class="container">                    
                    <button id="botonConfirmarJ" aria-label="Close" class="btn btn-primary"
                            data-dismiss="modal">SI! Borremos los jugadores!</button>
                    <button id="botonCancelar" aria-label="Close" class="btn btn-primary"
                            data-dismiss="modal">Nop, no borremos nada!</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection