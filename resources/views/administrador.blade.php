@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <ul class="nav nav-tabs" id="Tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="CrearJugador_Tab" data-toggle="tab" href="#CrearJugador" role="tab" aria-controls="CrearJugador" aria-selected="true">Crear Jugador</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="CrearGrupo_Tab" data-toggle="tab" href="#CrearGrupo" role="tab" aria-controls="CrearGrupo" aria-selected="false">Crear Grupo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="CrearPartido_Tab" data-toggle="tab" href="#CrearPartido" role="tab" aria-controls="CrearPartido" aria-selected="false">Crear Partido</a>
                </li>                    
            </ul>
        </div>
        <div class="col-3"></div>
    </div>
</div>
<div class="tab-content" id="TabsContent">
    <div class="tab-pane fade show active" id="CrearJugador" role="tabpanel" aria-labelledby="CrearJugador_Tab">
        <br/>
        <div class="container">
            <form action="{{action('AdminController@crearJugador')}}" method="post">                
                @csrf              
                <div class="form-group">
                    <label for="formGroupExampleInput">Nombre</label>
                    <input type="text" class="form-control" name="InNombre">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Imagen</label>
                    <input type="text" class="form-control" name="InImg">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mazo 1</label>
                    <textarea class="form-control" name="InDeck1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mazo 2</label>
                    <textarea class="form-control" name="InDeck2" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mazo 3</label>
                    <textarea class="form-control" name="InDeck3" rows="3"></textarea>
                </div>
                <button class="btn btn-primary">Aceptar</button>
            </form>
        </div>
    </div>
    <div class="tab-pane fade" id="CrearGrupo" role="tabpanel" aria-labelledby="CrearGrupo_Tab">
        <br/>
        <div class="container-fluid" id="divGrupos">
            <button class="btn btn-primary" onclick="generarGrupos('divGrupos');">Generar Grupos</button>
        </div>
    </div>
    <div class="tab-pane fade" id="CrearPartido" role="tabpanel" aria-labelledby="CrearPartido_Tab">
        <br/>
        <div class="container-fluid" id="divPartidos">
            <button class="btn btn-primary" onclick="generarPartidos('divPartidos');">Generar Partidos</button>
        </div>
    </div>
</div>

<div class="modal fade" id="ventanaPartido" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <div class="form-group">
                        <label for="formGroupExampleInput">Fecha</label>
                        <input id="textFecha" type="text" class="form-control" name="textFecha">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Hora</label>
                        <input id="textHora" type="text" class="form-control" name="textHora">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Editor</label>
                        <input id="textEditor" type="text" class="form-control" name="textEditor">
                    </div>
                    <button id="botonModal" type="submit" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
