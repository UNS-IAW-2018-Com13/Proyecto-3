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
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaCrearJugador">Crear Jugador</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaConfirmacionJ"
                onclick="modalAdvertenciaJugadoresAdmin('divMensajes', 'divResultados');">Eliminar Jugadores</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaConfirmacionUJ"
                onclick="modalAdvertenciaUltimoJugadorAdmin('divMensajes', 'divResultados');">Eliminar Ultimo Jugador</button>
    </div>
</div>

<div class="modal fade" id="ventanaCrearJugador" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" 
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CREAR JUGADOR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                        
                <div class="container">                    
                    <div class="form-group">
                        <label>Nombre</label>
                        <input id="textNombreC" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <input type="file" id="textAvatarC" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Clase Mazo 1</label>
                        <select class="custom-select" id="textMazo1C">
                            <option selected>Seleccionar...</option>
                            <option value="wlk">Brujo</option>
                            <option value="hnt">Cazador</option>
                            <option value="sha">Chaman</option>
                            <option value="drd">Druida</option>
                            <option value="war">Guerrero</option>
                            <option value="mag">Mago</option>
                            <option value="pal">Paladin</option>
                            <option value="rog">Picaro</option>
                            <option value="prt">Sacerdote</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Clase Mazo 2</label>
                        <select class="custom-select" id="textMazo2C">
                            <option selected>Seleccionar...</option>
                            <option value="wlk">Brujo</option>
                            <option value="hnt">Cazador</option>
                            <option value="sha">Chaman</option>
                            <option value="drd">Druida</option>
                            <option value="war">Guerrero</option>
                            <option value="mag">Mago</option>
                            <option value="pal">Paladin</option>
                            <option value="rog">Picaro</option>
                            <option value="prt">Sacerdote</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Clase Mazo 3</label>
                        <select class="custom-select" id="textMazo3C">
                            <option selected>Seleccionar...</option>
                            <option value="wlk">Brujo</option>
                            <option value="hnt">Cazador</option>
                            <option value="sha">Chaman</option>
                            <option value="drd">Druida</option>
                            <option value="war">Guerrero</option>
                            <option value="mag">Mago</option>
                            <option value="pal">Paladin</option>
                            <option value="rog">Picaro</option>
                            <option value="prt">Sacerdote</option>
                        </select>
                    </div>
                    <div class="container">
                        <button type="submit" aria-label="Close" 
                                class="btn btn-primary" data-dismiss="modal"
                                onclick="crearJugador('divMensajes', 'divResultados')">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ventanaEditarJugador" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" 
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloVentanaEditar">EDITAR JUGADOR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                        
                <div class="container">                    
                    <div class="form-group">
                        <label>Nombre</label>
                        <input id="textNombreE" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <input type="file" id="textAvatarE" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Clase Mazo 1</label>
                        <select class="custom-select" id="textMazo1E">
                            <option selected>Seleccionar...</option>
                            <option value="wlk">Brujo</option>
                            <option value="hnt">Cazador</option>
                            <option value="sha">Chaman</option>
                            <option value="drd">Druida</option>
                            <option value="war">Guerrero</option>
                            <option value="mag">Mago</option>
                            <option value="pal">Paladin</option>
                            <option value="rog">Picaro</option>
                            <option value="prt">Sacerdote</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Clase Mazo 2</label>
                        <select class="custom-select" id="textMazo2E">
                            <option selected>Seleccionar...</option>
                            <option value="wlk">Brujo</option>
                            <option value="hnt">Cazador</option>
                            <option value="sha">Chaman</option>
                            <option value="drd">Druida</option>
                            <option value="war">Guerrero</option>
                            <option value="mag">Mago</option>
                            <option value="pal">Paladin</option>
                            <option value="rog">Picaro</option>
                            <option value="prt">Sacerdote</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Clase Mazo 3</label>
                        <select class="custom-select" id="textMazo3E">
                            <option selected>Seleccionar...</option>
                            <option value="wlk">Brujo</option>
                            <option value="hnt">Cazador</option>
                            <option value="sha">Chaman</option>
                            <option value="drd">Druida</option>
                            <option value="war">Guerrero</option>
                            <option value="mag">Mago</option>
                            <option value="pal">Paladin</option>
                            <option value="rog">Picaro</option>
                            <option value="prt">Sacerdote</option>
                        </select>
                    </div>
                    <div class="container">
                        <button id="botonModalEditar" type="submit" aria-label="Close" 
                                class="btn btn-primary" data-dismiss="modal"
                                onclick="editarJugador('divMensajes', 'divResultados')">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ventanaConfirmacionUJ" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADVERTENCIA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h4>CUIDADO!</h5>
                        <h5>Estas a punto de borrar el ultimo jugador agregado al torneo!</h5>
                        <h5>Estas seguro que queres hacer esto?</h5>
                </div>
                <br/>
                <div class="container">                    
                    <button id="botonConfirmarUJ" aria-label="Close" class="btn btn-primary"
                            data-dismiss="modal">SI! Borremos al jugador!</button>
                    <button aria-label="Close" class="btn btn-primary"
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
            <div class="modal-header">
                <h5 class="modal-title">ADVERTENCIA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h4>CUIDADO!</h5>
                        <h5>Estas a punto de borrar todos los jugadores del torneo!</h5>
                        <h5>Estas seguro que queres hacer esto?</h5>
                </div>
                <br/>
                <div class="container">                    
                    <button id="botonConfirmarJ" aria-label="Close" class="btn btn-primary"
                            data-dismiss="modal">SI! Borremos los jugadores!</button>
                    <button aria-label="Close" class="btn btn-primary"
                            data-dismiss="modal">Nop, no borremos nada!</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection