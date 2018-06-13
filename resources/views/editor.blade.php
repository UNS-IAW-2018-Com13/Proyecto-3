@extends('layouts.app')

@section('content')
<br/>
<br/>
<div class="container-fluid">
@if ($msg !== "ok")
    {{ $msg }}
@else
    <table class="table table-striped" id="TPartidos">
        <thead>
            <tr>
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
                <th>Editar</th>
                <th>Status</th>
            </tr>
        </thead>
        @for ($i = 0; $i < sizeof($partidos); $i++)
        <tr>
            @for ($j = 0; $j < sizeof(json_decode($partidos[$i])->rounds); $j++)
                <td id="R{{ $i }}{{ json_decode($partidos[$i])->id }}">
                    {{ json_decode($partidos[$i])->rounds[$j]->ganador }}
                </td>
                <td id="MGR{{ $i }}{{ json_decode($partidos[$i])->id }}">
                    {{ json_decode($partidos[$i])->rounds[$j]->mazoG }}
                </td>
                <td id="MPR{{ $i }}{{ json_decode($partidos[$i])->id }}">
                    {{ json_decode($partidos[$i])->rounds[$j]->mazoP }}
                </td>
            @endfor
            <td id="COM{{ json_decode($partidos[$i])->id }}">
                {{ json_decode($partidos[$i])->comentario }}
            </td>
            <td>
                <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaPartido" onclick="completarModalEditor('{{ json_decode($partidos[$i])->id }}');">Editar</button>
            </td>
            <td id="STAT{{ json_decode($partidos[$i])->id }}">
                -
            </td>
        </tr>
        @endfor
        </tbody>
    </table>
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
                        <label for="formGroupExampleInput">Ganador Ronda 1</label>
                        <input id="textGR1" type="text" class="form-control" name="GR1">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mazo Ganador Ronda 1</label>
                        <input id="textMGR1" type="text" class="form-control" name="MGR1">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mazo Perdedor Ronda 1</label>
                        <input id="textMPR1" type="text" class="form-control" name="MPR1">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Ganador Ronda 2</label>
                        <input id="textGR2" type="text" class="form-control" name="GR2">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mazo Ganador Ronda 2</label>
                        <input id="textMGR2" type="text" class="form-control" name="MGR2">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mazo Perdedor Ronda 2</label>
                        <input id="textMPR2" type="text" class="form-control" name="MPR2">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Ganador Ronda 3</label>
                        <input id="textGR3" type="text" class="form-control" name="GR3">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mazo Ganador Ronda 3</label>
                        <input id="textMGR3" type="text" class="form-control" name="MGR3">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mazo Perdedor Ronda 3</label>
                        <input id="textMPR3" type="text" class="form-control" name="MPR3">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Ganador Ronda 4</label>
                        <input id="textGR4" type="text" class="form-control" name="GR4">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mazo Ganador Ronda 4</label>
                        <input id="textMGR4" type="text" class="form-control" name="MGR4">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mazo Perdedor Ronda 4</label>
                        <input id="textMPR4" type="text" class="form-control" name="MPR4">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Ganador Ronda 5</label>
                        <input id="textGR5" type="text" class="form-control" name="GR5">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mazo Ganador Ronda 5</label>
                        <input id="textMGR5" type="text" class="form-control" name="MGR5">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mazo Perdedor Ronda 5</label>
                        <input id="textMPR5" type="text" class="form-control" name="MPR5">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Comentario</label>
                        <textarea id="textComent" class="form-control" name="Coment" rows="3"></textarea>
                    </div>
                    <button id="botonModal" type="submit" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection