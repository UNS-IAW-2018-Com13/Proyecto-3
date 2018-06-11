function generarGrupos(idDiv) {
    var divGrupos = document.getElementById(idDiv);
    var boton = divGrupos.lastChild;

    $.get('/generarGrupos', function (res, req) {
        if (res.hasOwnProperty("msg")) {
            var mensaje = document.createTextNode(res.msg);
            divGrupos.removeChild(boton);
            divGrupos.appendChild(mensaje);
            divGrupos.appendChild(boton);
        } else {
            var tabla = document.createElement("table");
            tabla.setAttribute("class", "table table-striped");

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

            for (var i = 0; i < res.length; i++) {
                var filaBody = document.createElement("tr");
                for (var j = 0; j < res[i].integrantes.length; j++) {
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
            var mensaje = document.createTextNode(res.msg);
            divPartidos.removeChild(boton);
            divPartidos.appendChild(mensaje);
            divPartidos.appendChild(boton);
        } else {
            var tabla = document.createElement("table");
            tabla.setAttribute("class", "table table-striped");

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

            celdaHead = document.createElement("th");
            titulo = document.createTextNode("STATUS");
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);

            headTabla.appendChild(filaHead);

            tabla.appendChild(headTabla);

            var cuerpoTabla = document.createElement("tbody");

            for (var i = 0; i < res.length; i++) {
                var filaBody = document.createElement("tr");
                filaBody.setAttribute("rowspan", "5");
                var subtitulo = document.createTextNode(res[i].grupo);
                filaBody.appendChild(subtitulo);
                cuerpoTabla.appendChild(filaBody);
                for (var j = 0; j < res[i].partidos.length; j++) {
                    filaBody = document.createElement("tr");
                    var celdaBody = document.createElement("td");
                    var partido = document.createTextNode(res[i].partidos[j].id);
                    celdaBody.appendChild(partido);
                    filaBody.appendChild(celdaBody);

                    var celdaBody = document.createElement("td");
                    celdaBody.setAttribute("id", "fecha" + res[i].partidos[j].id);
                    var fecha = document.createTextNode(res[i].partidos[j].fecha);
                    celdaBody.appendChild(fecha);
                    filaBody.appendChild(celdaBody);

                    var celdaBody = document.createElement("td");
                    celdaBody.setAttribute("id", "hora" + res[i].partidos[j]);
                    var hora = document.createTextNode(res[i].partidos[j].hora);
                    celdaBody.appendChild(hora);
                    filaBody.appendChild(celdaBody);

                    var celdaBody = document.createElement("td");
                    celdaBody.setAttribute("id", "editor" + res[i].partidos[j]);
                    var editor = document.createTextNode(res[i].partidos[j].editor);
                    celdaBody.appendChild(editor);
                    filaBody.appendChild(celdaBody);

                    var celdaBody = document.createElement("td");
                    var botonEditar = document.createElement("button");
                    botonEditar.setAttribute("class", "btn btn-primary");
                    botonEditar.setAttribute("data-toggle", "modal");
                    botonEditar.setAttribute("data-target", "#ventanaPartido");
                    botonEditar.setAttribute("onclick", "completarModal('" + res[i].partidos[j] + "')");
                    var textoBoton = document.createTextNode("Editar");
                    botonEditar.appendChild(textoBoton);
                    celdaBody.appendChild(botonEditar);
                    filaBody.appendChild(celdaBody);


                    var celdaBody = document.createElement("td");
                    celdaBody.setAttribute("id", "status" + res[i].partidos[j]);
                    var status = document.createTextNode(" ");
                    celdaBody.appendChild(status);
                    filaBody.appendChild(celdaBody);
                    cuerpoTabla.appendChild(filaBody);
                }
            }

            tabla.appendChild(cuerpoTabla);
            divPartidos.removeChild(boton);
            divPartidos.appendChild(tabla);
        }
    });
}

function completarModal(id) {
    var titulo = document.getElementById("tituloVentana");
    titulo.removeChild(titulo.firstChild);
    titulo.appendChild(document.createTextNode(id));
    var boton = document.getElementById("botonModal");
    boton.setAttribute("onclick", "actualizarTablaPartidos('" + id + "')");
}

function actualizarTablaPartidos(id) {
    var fecha = document.getElementById("fecha" + id);
    var hora = document.getElementById("hora" + id);
    var editor = document.getElementById("editor" + id);
    var status = document.getElementById("editor" + id);

    var tfecha = document.getElementById("textFecha").value;
    var thora = document.getElementById("textHora").value;
    var teditor = document.getElementById("textEditor").value;
    
    $.post('/asignarEditores', {"id":id, "fecha":tfecha, "hora":thora, "editor": teditor}, function (res, req) {
        if (res.hasOwnProperty("msg")) {
            if (res.msg === "ok") {
                fecha.removeChild(fecha.firstChild);
                fecha.appendChild(document.createTextNode(tfecha));
                hora.removeChild(hora.firstChild);
                hora.appendChild(document.createTextNode(thora));
                editor.removeChild(editor.firstChild);
                editor.appendChild(document.createTextNode(teditor));
                status.removeChild(status.firstChild);
                status.appendChild(document.createTextNode(res.msg));
            } else {
                var status = document.getElementById("editor" + id);
                status.removeChild(status.firstChild);
                status.appendChild(document.createTextNode(res.msg));
            }
        } else {
            var status = document.getElementById("editor" + id);
            status.removeChild(status.firstChild);
            status.appendChild(document.createTextNode("ERROR"));
        }
    });
}