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
        <div class="container">
            <form action="{{action('JugadorController@show')}}" method="post">                
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
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </form>
        </div>
    </div>
    <div class="tab-pane fade" id="CrearGrupo" role="tabpanel" aria-labelledby="CrearGrupo_Tab">
        <div class="container">
            ver database jugadores -> asignar a grupo -> 4 grupos prefabricados
        </div>
    </div>
    <div class="tab-pane fade" id="CrearPartido" role="tabpanel" aria-labelledby="CrearPartido_Tab">
        <div class="container">
            <button type="submit" class="btn btn-primary">Generar partidos</button>

            asignar editores a partidos -> manual

        </div>
    </div>
</div>
@endsection
