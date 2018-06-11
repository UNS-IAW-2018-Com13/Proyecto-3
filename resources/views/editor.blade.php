@extends('layouts.app')

@section('content')
<div class="container">
        <table class="table table-striped" id="TPartidos">
            <thead>
                <tr>
                    <th>ENFRENTAMIENTO 1</th>
                    <th>ENFRENTAMIENTO 2</th>
                    <th>ENFRENTAMIENTO 3</th>
                    <th>ENFRENTAMIENTO 4</th>
                    <th>ENFRENTAMIENTO 5</th>
                    <th>COMENTARIO</th>
                    <th>EDITAR</th>
                </tr>
            </thead>
            
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
                    <form>                
                        <div class="form-group">
                            <label for="formGroupExampleInput">Fecha</label>
                            <input id="textFecha" type="text" class="form-control" name="textFecha">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Hora</label>
                            <input id="textHora" type="text" class="form-control" name="textHora">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Hora</label>
                            <input id="textEditor" type="text" class="form-control" name="textEditor">
                        </div>
                        <button id="botonModal" type="submit" class="btn btn-primary">Aceptar</button>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection