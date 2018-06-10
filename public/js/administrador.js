function generarGrupos(idDiv) {
    var divGrupos = document.getElementById(idDiv);
    var boton = divGrupos.lastChild;

    $.get('/generarGrupos', function (res, req) {
        if (res.hasOwnProperty("msg")) {
            var mensaje = document.createTextNode(res.msj);
            divGrupos.removeChild(boton);
            divGrupos.appendChild(mensaje);
            divGrupos.appendChild(boton);
        } else {
            var tabla = document.createElement("table");
            tabla.setAttribute("class","table table-striped");
            
            var headTabla = document.createElement("thead");
            var filaHead = document.createElement("tr");
            
            var celdaHead = document.createElement("th");
            var titulo = document.createTextNode("GRUPO " + res[0].nombre);
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);
            
            celdaHead = document.createElement("th");
            titulo = document.createTextNode("GRUPO " + res[1].nombre);
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);
            
            celdaHead = document.createElement("th");
            titulo = document.createTextNode("GRUPO " + res[2].nombre);
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);
            
            celdaHead = document.createElement("th");
            titulo = document.createTextNode("GRUPO " + res[3].nombre);
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);
            
            headTabla.appendChild(filaHead);
            
            tabla.appendChild(headTabla);
            
            var cuerpoTabla = document.createElement("tbody");
            
            for(var i = 0; i < res.length; i++){
                var filaBody = document.createElement("tr");
                for(var j = 0; j < res[i].integrantes.length; j++){
                    var celdaBody = document.createElement("td");
                    var integrante = document.createTextNode(res[j].integrantes[i]);
                    celdaBody.appendChild(integrante);
                    filaBody.appendChild(celdaBody);
                }
                cuerpoTabla.appendChild(filaBody);
            }
            
            tabla.appendChild(cuerpoTabla);
            divGrupos.removeChild(boton);
            divGrupos.appendChild(tabla);
        }
    });
}

function generarPartidos(idDiv) {
    var divPartidos = document.getElementById(idDiv);
    var boton = divPartidos.lastChild;

    $.get('/generarPartidos', function (res, req) {
        if (res.hasOwnProperty("msg")) {
            var mensaje = document.createTextNode(res.msj);
            divPartidos.removeChild(boton);
            divPartidos.appendChild(mensaje);
            divPartidos.appendChild(boton);
        } else {
            var tabla = document.createElement("table");
            tabla.setAttribute("class","table table-striped");
            
            var headTabla = document.createElement("thead");
            var filaHead = document.createElement("tr");
            
            var celdaHead = document.createElement("th");
            var titulo = document.createTextNode("ID");
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);
            
            celdaHead = document.createElement("th");
            titulo = document.createTextNode("FECHA");
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);
            
            celdaHead = document.createElement("th");
            titulo = document.createTextNode("HORA");
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);
            
            celdaHead = document.createElement("th");
            titulo = document.createTextNode("EDITOR");
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);
            
            celdaHead = document.createElement("th");
            titulo = document.createTextNode("EDITAR");
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);
            
            headTabla.appendChild(filaHead);
            
            tabla.appendChild(headTabla);
            
            var cuerpoTabla = document.createElement("tbody");
            
            for(var i = 0; i < res.length; i++){
                var filaBody = document.createElement("tr");
                filaBody.setAttribute("rowspan", "5");
                var subtitulo = document.createTextNode(res[i].grupo);
                filaBody.appendChild(subtitulo);
                cuerpoTabla.appendChild(filaBody);
                filaBody = document.createElement("tr");
                for(var j = 0; j < res[i].partidos.length; j++){
                    var celdaBody = document.createElement("td");
                    var partido = document.createTextNode(res[j].partidos[i]);
                    celdaBody.appendChild(partido);
                    filaBody.appendChild(celdaBody);
                    
                    var celdaBody = document.createElement("td");
                    var fecha = document.createTextNode(" ");
                    celdaBody.appendChild(fecha);
                    filaBody.appendChild(celdaBody);
                    
                    var celdaBody = document.createElement("td");
                    var hora = document.createTextNode(" ");
                    celdaBody.appendChild(hora);
                    filaBody.appendChild(celdaBody);
                    
                    var celdaBody = document.createElement("td");
                    var editor = document.createTextNode(" ");
                    celdaBody.appendChild(editor);
                    filaBody.appendChild(celdaBody);
                    
                    var celdaBody = document.createElement("td");
                    var botonEditar = document.createElement("button");
                    botonEditar.setAttribute("class", "btn btn-primary");
                    botonEditar.setAttribute("onclick", "completarModal()");
                    celdaBody.appendChild(botonEditar);
                    filaBody.appendChild(celdaBody);
                }
                cuerpoTabla.appendChild(filaBody);
            }
            
            tabla.appendChild(cuerpoTabla);
            divPartidos.removeChild(boton);
            divPartidos.appendChild(tabla);
        }
    });
}