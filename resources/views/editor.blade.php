@extends('layouts.app')

@section('content')
<br/>
<br/>
<div class="container-fluid" id="divMensajes">
@if ($cod === "FAIL")
    {{ $msg }}
</div>
@else
    {{ $msg }}
</div>
<div class="container-fluid">
    <table class="table table-striped" id="TPartidos">
        <thead>
            <tr>
                <th>Status</th>
                <th>Editar</th>
                <th>Ganador R1</th>
                <th>Mazo G R1</th>
                <th>Mazo P R1</th>
                <th>Ganador R2</th>
                <th>Mazo G R2</th>
                <th>Mazo P R2</th>
                <th>Ganador R3</th>
                <th>Mazo G R3</th>
                <th>Mazo P R3</th>
                <th>Ganador R4</th>
                <th>Mazo G R4</th>
                <th>Mazo P R4</th>
                <th>Ganador R5</th>
                <th>Mazo G R5</th>
                <th>Mazo P R5</th>
                <th>Comentario</th>
            </tr>
        </thead>
        @for ($i = 0; $i < sizeof($partidos); $i++)
        <tr>
            <td id="STAT{{ json_decode($partidos[$i])->id }}">
                -
            </td>
            <td>
                <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaPartido" onclick="completarModalEditor('{{ json_decode($partidos[$i])->id }}',
                        '{{ json_decode($partidos[$i])->jugador1 }}' ,
                        '{{ json_decode($partidos[$i])->jugador2 }}' ,
                        {{ json_encode($mazos[json_decode($partidos[$i])->jugador1]) }} ,
                        {{ json_encode($mazos[json_decode($partidos[$i])->jugador2]) }});">Editar</button>
            </td>
            @for ($j = 0; $j < sizeof(json_decode($partidos[$i])->rounds); $j++)
            <td id="R{{ $j + 1 }}{{ json_decode($partidos[$i])->id }}">
                {{ json_decode($partidos[$i])->rounds[$j]->ganador }}
            </td>
            <td id="MGR{{ $j + 1 }}{{ json_decode($partidos[$i])->id }}">
                {{ json_decode($partidos[$i])->rounds[$j]->mazoG }}
            </td>
            <td id="MPR{{ $j + 1 }}{{ json_decode($partidos[$i])->id }}">
                {{ json_decode($partidos[$i])->rounds[$j]->mazoP }}
            </td>
            @endfor
            <td id="COM{{ json_decode($partidos[$i])->id }}">
                {{ json_decode($partidos[$i])->comentario }}
            </td>
        </tr>
        @endfor
        </tbody>
    </table>
</div>
<div class="modal fade" id="ventanaPartido" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" id="ventanaTitulo">
                <h5 class="modal-title" id="tituloVentana">PARTIDO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ventanaCuerpo">
                @for ($i = 1; $i < 6; $i++)
                <div class="row">
                    <div class="col-4 form-group">
                        <label>Ganador Ronda {{ $i }}</label>
                        <select class="custom-select" id="textGR{{ $i }}">
                        </select>
                    </div>
                    <div class="col-4 form-group">
                        <label>Mazo Ganador Ronda {{ $i }}</label>
                        <select class="custom-select" id="textMGR{{ $i }}">
                        </select>
                    </div>
                    <div class="col-4 form-group">
                        <label>Mazo Perdedor Ronda {{ $i }}</label>
                        <select class="custom-select" id="textMPR{{ $i }}">
                        </select>
                    </div>
                </div>
                <br/>
                @endfor
                <div class="row">
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1">Comentario</label>
                        <textarea id="textComent" class="form-control" name="Coment" rows="3"></textarea>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-5"></div>
                    <div class="col-2">
                        <button id="botonModal" type="submit" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
                    <div class="col-5"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endif
@endsection