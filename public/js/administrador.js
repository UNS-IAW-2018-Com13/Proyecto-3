function verJugadores(idDivMsg, idDivRes) {
    $.get('/administrador/verJugadores', function (res, req) {
        var divMsg = document.getElementById(idDivMsg);
        var divRes = document.getElementById(idDivRes);
        var mensaje = document.createTextNode(res.msg);
        if (res.cod === "FAIL") {
            if (divMsg.firstChild !== null) {
                divMsg.removeChild(divMsg.firstChild);
                divMsg.appendChild(mensaje);
            } else {
                divMsg.appendChild(mensaje);
            }
        } else {
            var tabla = document.createElement("table");
            tabla.setAttribute("class", "table table-striped");

            var headTabla = document.createElement("thead");
            var filaHead = document.createElement("tr");

            var celdaHead = document.createElement("th");
            var titulo = document.createTextNode("AVATAR");
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);

            celdaHead = document.createElement("th");
            titulo = document.createTextNode("NOMBRE");
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);

            celdaHead = document.createElement("th");
            titulo = document.createTextNode("MAZO 1");
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);

            celdaHead = document.createElement("th");
            titulo = document.createTextNode("MAZO 2");
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);

            celdaHead = document.createElement("th");
            titulo = document.createTextNode("MAZO 3");
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

            for (var i = 0; i < res.jugadores.length; i++) {
                /*
                 var filaBody = document.createElement("tr");
                 var celdaBody = document.createElement("td");
                 celdaBody.setAttribute("id", "avatar" + res.jugadores[i].nombre);
                 var avatar = document.createTextNode(res.jugadores[i].avatar);
                 celdaBody.appendChild(partido);
                 filaBody.appendChild(celdaBody);
                 */
                var filaBody = document.createElement("tr");
                var celdaBody = document.createElement("td");
                var avatar = document.createTextNode("");
                celdaBody.appendChild(avatar);
                filaBody.appendChild(celdaBody);

                var celdaBody = document.createElement("td");
                celdaBody.setAttribute("id", "nombre" + res.jugadores[i].nombre);
                var nombre = document.createTextNode(res.jugadores[i].nombre);
                celdaBody.appendChild(nombre);
                filaBody.appendChild(celdaBody);

                var celdaBody = document.createElement("td");
                celdaBody.setAttribute("id", "mazo1" + res.jugadores[i].nombre);
                var mazo1 = document.createTextNode(res.jugadores[i].mazos[0]);
                celdaBody.appendChild(mazo1);
                filaBody.appendChild(celdaBody);

                var celdaBody = document.createElement("td");
                celdaBody.setAttribute("id", "mazo2" + res.jugadores[i].nombre);
                var mazo2 = document.createTextNode(res.jugadores[i].mazos[1]);
                celdaBody.appendChild(mazo2);
                filaBody.appendChild(celdaBody);

                var celdaBody = document.createElement("td");
                celdaBody.setAttribute("id", "mazo3" + res.jugadores[i].nombre);
                var mazo3 = document.createTextNode(res.jugadores[i].mazos[2]);
                celdaBody.appendChild(mazo3);
                filaBody.appendChild(celdaBody);

                var celdaBody = document.createElement("td");
                var botonEditar = document.createElement("button");
                botonEditar.setAttribute("class", "btn btn-primary");
                botonEditar.setAttribute("data-toggle", "modal");
                botonEditar.setAttribute("data-target", "#ventanaEditarJugador");
                //botonEditar.setAttribute("onclick", "completarModalJugadorAdmin('" + res.jugadores[i].nombre + "')");
                var textoBoton = document.createTextNode("Editar");
                botonEditar.appendChild(textoBoton);
                celdaBody.appendChild(botonEditar);
                filaBody.appendChild(celdaBody);


                var celdaBody = document.createElement("td");
                celdaBody.setAttribute("id", "status" + res.jugadores[i].nombre);
                var status = document.createTextNode("-");
                celdaBody.appendChild(status);
                filaBody.appendChild(celdaBody);
                cuerpoTabla.appendChild(filaBody);
            }
            tabla.appendChild(cuerpoTabla);
            if (divRes.firstChild !== null) {
                divRes.removeChild(divRes.firstChild);
                divRes.appendChild(tabla);
            } else {
                divRes.appendChild(tabla);
            }
            divRes.appendChild(tabla);
            if (divMsg.firstChild !== null) {
                divMsg.removeChild(divMsg.firstChild);
                divMsg.appendChild(mensaje);
            } else {
                divMsg.appendChild(mensaje);
            }
        }
    });
}

function crearJugador(idDivMsg, idDivRes) {
    var tnombre = document.getElementById("textNombre").value;
    var tavatar = document.getElementById("textAvatar").value;
    var tmazo1 = document.getElementById("textMazo1").value;
    var tmazo2 = document.getElementById("textMazo2").value;
    var tmazo3 = document.getElementById("textMazo3").value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.post('/administrador/crearJugador', {"nombre": tnombre, "avatar": tavatar,
        "mazo1": tmazo1, "mazo2": tmazo2, "mazo3": tmazo3}, function (res, req) {
        var divMsg = document.getElementById(idDivMsg);
        var divRes = document.getElementById(idDivRes);
        var mensaje = document.createTextNode(res.msg);
        if (res.cod === "OK") {
            var divJug = document.createElement("div");
            divJug.appendChild(document.createTextNode("Nombre: " + tnombre));
            divJug.appendChild(document.createElement("br"));
            divJug.appendChild(document.createTextNode("Clase Mazo 1: " + tmazo1));
            divJug.appendChild(document.createElement("br"));
            divJug.appendChild(document.createTextNode("Clase Mazo 2: " + tmazo2));
            divJug.appendChild(document.createElement("br"));
            divJug.appendChild(document.createTextNode("Clase Mazo 3: " + tmazo3));
            if (divRes.firstChild !== null) {
                divRes.removeChild(divRes.firstChild);
                divRes.appendChild(divJug);
            } else {
                divRes.appendChild(divJug);
            }
        }

        if (divMsg.firstChild !== null) {
            divMsg.removeChild(divMsg.firstChild);
            divMsg.appendChild(mensaje);
        } else {
            divMsg.appendChild(mensaje);
        }
    });
}

function eliminarJugadores(idDivMsg, idDivRes) {
    $.get('/administrador/eliminarJugadores', function (res, req) {
        var divMsg = document.getElementById(idDivMsg);
        var divRes = document.getElementById(idDivRes);
        var mensaje = document.createTextNode(res.msg);
        if (divMsg.firstChild !== null) {
            divMsg.removeChild(divMsg.firstChild);
            divMsg.appendChild(mensaje);
        } else {
            divMsg.appendChild(mensaje);
        }
        var vacio = document.createTextNode(" ");
        if (divRes.firstChild !== null) {
            divRes.removeChild(divRes.firstChild);
            divRes.appendChild(vacio);
        } else {
            divRes.appendChild(vacio);
        }
    });
}

function eliminarUltimoJugador(idDivMsg, idDivRes) {
    $.get('/administrador/eliminarUltimoJugador', function (res, req) {
        var divMsg = document.getElementById(idDivMsg);
        var divRes = document.getElementById(idDivRes);
        var mensaje = document.createTextNode(res.msg);
        if (divMsg.firstChild !== null) {
            divMsg.removeChild(divMsg.firstChild);
            divMsg.appendChild(mensaje);
        } else {
            divMsg.appendChild(mensaje);
        }
        var vacio = document.createTextNode(" ");
        if (divRes.firstChild !== null) {
            divRes.removeChild(divRes.firstChild);
            divRes.appendChild(vacio);
        } else {
            divRes.appendChild(vacio);
        }
    });
}

function verGrupos(idDivMsg, idDivRes) {
    $.get('/administrador/verGrupos', function (res, req) {
        var divMsg = document.getElementById(idDivMsg);
        var divRes = document.getElementById(idDivRes);
        var mensaje = document.createTextNode(res.msg);
        if (res.cod === "FAIL") {
            if (divMsg.firstChild !== null) {
                divMsg.removeChild(divMsg.firstChild);
                divMsg.appendChild(mensaje);
            } else {
                divMsg.appendChild(mensaje);
            }
        } else {
            var tabla = document.createElement("table");
            tabla.setAttribute("class", "table table-striped");

            var headTabla = document.createElement("thead");
            var filaHead = document.createElement("tr");

            var celdaHead = document.createElement("th");
            var titulo = document.createTextNode("GRUPO " + res.grupos[0].nombre);
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);

            celdaHead = document.createElement("th");
            titulo = document.createTextNode("GRUPO " + res.grupos[1].nombre);
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);

            celdaHead = document.createElement("th");
            titulo = document.createTextNode("GRUPO " + res.grupos[2].nombre);
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);

            celdaHead = document.createElement("th");
            titulo = document.createTextNode("GRUPO " + res.grupos[3].nombre);
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);

            headTabla.appendChild(filaHead);

            tabla.appendChild(headTabla);

            var cuerpoTabla = document.createElement("tbody");
            for (var i = 0; i < res.grupos.length; i++) {
                var filaBody = document.createElement("tr");
                for (var j = 0; j < res.grupos[i].integrantes.length; j++) {
                    var celdaBody = document.createElement("td");
                    var integrante = document.createTextNode(res.grupos[j].integrantes[i]);
                    celdaBody.appendChild(integrante);
                    filaBody.appendChild(celdaBody);
                }
                cuerpoTabla.appendChild(filaBody);
            }
            tabla.appendChild(cuerpoTabla);
            if (divRes.firstChild !== null) {
                divRes.removeChild(divRes.firstChild);
                divRes.appendChild(tabla);
            } else {
                divRes.appendChild(tabla);
            }
            if (divMsg.firstChild !== null) {
                divMsg.removeChild(divMsg.firstChild);
                divMsg.appendChild(mensaje);
            } else {
                divMsg.appendChild(mensaje);
            }
        }
    });
}

function generarGrupos(idDivMsg, idDivRes) {
    $.get('/administrador/generarGrupos', function (res, req) {
        var divMsg = document.getElementById(idDivMsg);
        var divRes = document.getElementById(idDivRes);
        var mensaje = document.createTextNode(res.msg);
        if (res.cod === "FJ") {
            if (divMsg.firstChild !== null) {
                divMsg.removeChild(divMsg.firstChild);
                divMsg.appendChild(mensaje);
            } else {
                divMsg.appendChild(mensaje);
            }
        } else {
            var tabla = document.createElement("table");
            tabla.setAttribute("class", "table table-striped");

            var headTabla = document.createElement("thead");
            var filaHead = document.createElement("tr");

            var celdaHead = document.createElement("th");
            var titulo = document.createTextNode("GRUPO " + res.grupos[0].nombre);
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);

            celdaHead = document.createElement("th");
            titulo = document.createTextNode("GRUPO " + res.grupos[1].nombre);
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);

            celdaHead = document.createElement("th");
            titulo = document.createTextNode("GRUPO " + res.grupos[2].nombre);
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);

            celdaHead = document.createElement("th");
            titulo = document.createTextNode("GRUPO " + res.grupos[3].nombre);
            celdaHead.appendChild(titulo);
            filaHead.appendChild(celdaHead);

            headTabla.appendChild(filaHead);

            tabla.appendChild(headTabla);

            var cuerpoTabla = document.createElement("tbody");
            for (var i = 0; i < res.grupos.length; i++) {
                var filaBody = document.createElement("tr");
                for (var j = 0; j < res.grupos[i].integrantes.length; j++) {
                    var celdaBody = document.createElement("td");
                    var integrante = document.createTextNode(res.grupos[j].integrantes[i]);
                    celdaBody.appendChild(integrante);
                    filaBody.appendChild(celdaBody);
                }
                cuerpoTabla.appendChild(filaBody);
            }

            tabla.appendChild(cuerpoTabla);
            if (divRes.firstChild !== null) {
                divRes.removeChild(divRes.firstChild);
                divRes.appendChild(tabla);
            } else {
                divRes.appendChild(tabla);
            }

            if (divMsg.firstChild !== null) {
                divMsg.removeChild(divMsg.firstChild);
                divMsg.appendChild(mensaje);
            } else {
                divMsg.appendChild(mensaje);
            }

        }
    });
}

function eliminarGrupos(idDivMsg, idDivRes) {
    $.get('/administrador/eliminarGrupos', function (res, req) {
        var divMsg = document.getElementById(idDivMsg);
        var divRes = document.getElementById(idDivRes);
        var mensaje = document.createTextNode(res.msg);
        if (divMsg.firstChild !== null) {
            divMsg.removeChild(divMsg.firstChild);
            divMsg.appendChild(mensaje);
        } else {
            divMsg.appendChild(mensaje);
        }
        var vacio = document.createTextNode(" ");
        if (divRes.firstChild !== null) {
            divRes.removeChild(divRes.firstChild);
            divRes.appendChild(vacio);
        } else {
            divRes.appendChild(vacio);
        }
    });
}

function verPartidos(idDivMsg, idDivRes) {
    $.get('/administrador/verPartidos', function (res, req) {
        var divMsg = document.getElementById(idDivMsg);
        var divRes = document.getElementById(idDivRes);
        var mensaje = document.createTextNode(res.msg);
        if (res.cod === "FAIL") {
            if (divMsg.firstChild !== null) {
                divMsg.removeChild(divMsg.firstChild);
                divMsg.appendChild(mensaje);
            } else {
                divMsg.appendChild(mensaje);
            }
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

            for (var i = 0; i < res.partidos.length; i++) {
                var filaBody = document.createElement("tr");
                var celdaBody = document.createElement("td");
                var partido = document.createTextNode(res.partidos[i].id);
                celdaBody.appendChild(partido);
                filaBody.appendChild(celdaBody);

                var celdaBody = document.createElement("td");
                celdaBody.setAttribute("id", "fecha" + res.partidos[i].id);
                var fecha = document.createTextNode(res.partidos[i].fecha);
                celdaBody.appendChild(fecha);
                filaBody.appendChild(celdaBody);

                var celdaBody = document.createElement("td");
                celdaBody.setAttribute("id", "hora" + res.partidos[i].id);
                var hora = document.createTextNode(res.partidos[i].hora);
                celdaBody.appendChild(hora);
                filaBody.appendChild(celdaBody);

                var celdaBody = document.createElement("td");
                celdaBody.setAttribute("id", "editor" + res.partidos[i].id);
                var editor = document.createTextNode(res.partidos[i].editor);
                celdaBody.appendChild(editor);
                filaBody.appendChild(celdaBody);

                var celdaBody = document.createElement("td");
                var botonEditar = document.createElement("button");
                botonEditar.setAttribute("class", "btn btn-primary");
                botonEditar.setAttribute("data-toggle", "modal");
                botonEditar.setAttribute("data-target", "#ventanaPartido");
                botonEditar.setAttribute("onclick", "modalPartidosAdmin('" + res.partidos[i].id + "', '" + idDivMsg + "', '" + idDivRes + "')");
                var textoBoton = document.createTextNode("Editar");
                botonEditar.appendChild(textoBoton);
                celdaBody.appendChild(botonEditar);
                filaBody.appendChild(celdaBody);


                var celdaBody = document.createElement("td");
                celdaBody.setAttribute("id", "status" + res.partidos[i].id);
                var status = document.createTextNode(" ");
                celdaBody.appendChild(status);
                filaBody.appendChild(celdaBody);
                cuerpoTabla.appendChild(filaBody);
            }
            tabla.appendChild(cuerpoTabla);
            if (divRes.firstChild !== null) {
                divRes.removeChild(divRes.firstChild);
                divRes.appendChild(tabla);
            } else {
                divRes.appendChild(tabla);
            }
            divRes.appendChild(tabla);
            if (divMsg.firstChild !== null) {
                divMsg.removeChild(divMsg.firstChild);
                divMsg.appendChild(mensaje);
            } else {
                divMsg.appendChild(mensaje);
            }
        }
    });
}

function generarPartidos(idDivMsg, idDivRes) {
    $.get('/administrador/generarPartidos', function (res, req) {
        var divMsg = document.getElementById(idDivMsg);
        var divRes = document.getElementById(idDivRes);
        var mensaje = document.createTextNode(res.msg);
        if (res.cod === "FG") {
            if (divMsg.firstChild !== null) {
                divMsg.removeChild(divMsg.firstChild);
                divMsg.appendChild(mensaje);
            } else {
                divMsg.appendChild(mensaje);
            }
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

            for (var i = 0; i < res.partidos.length; i++) {
                var filaBody = document.createElement("tr");
                var celdaBody = document.createElement("td");
                var partido = document.createTextNode(res.partidos[i].id);
                celdaBody.appendChild(partido);
                filaBody.appendChild(celdaBody);

                var celdaBody = document.createElement("td");
                celdaBody.setAttribute("id", "fecha" + res.partidos[i].id);
                var fecha = document.createTextNode(res.partidos[i].fecha);
                celdaBody.appendChild(fecha);
                filaBody.appendChild(celdaBody);

                var celdaBody = document.createElement("td");
                celdaBody.setAttribute("id", "hora" + res.partidos[i].id);
                var hora = document.createTextNode(res.partidos[i].hora);
                celdaBody.appendChild(hora);
                filaBody.appendChild(celdaBody);

                var celdaBody = document.createElement("td");
                celdaBody.setAttribute("id", "editor" + res.partidos[i].id);
                var editor = document.createTextNode(res.partidos[i].editor);
                celdaBody.appendChild(editor);
                filaBody.appendChild(celdaBody);

                var celdaBody = document.createElement("td");
                var botonEditar = document.createElement("button");
                botonEditar.setAttribute("class", "btn btn-primary");
                botonEditar.setAttribute("data-toggle", "modal");
                botonEditar.setAttribute("data-target", "#ventanaPartido");
                botonEditar.setAttribute("onclick", "modalPartidosAdmin('" + res.partidos[i].id + "', '" + idDivMsg + "', '" + idDivRes + "')");
                var textoBoton = document.createTextNode("Editar");
                botonEditar.appendChild(textoBoton);
                celdaBody.appendChild(botonEditar);
                filaBody.appendChild(celdaBody);


                var celdaBody = document.createElement("td");
                celdaBody.setAttribute("id", "status" + res.partidos[i].id);
                var status = document.createTextNode(" ");
                celdaBody.appendChild(status);
                filaBody.appendChild(celdaBody);
                cuerpoTabla.appendChild(filaBody);
            }
            tabla.appendChild(cuerpoTabla);
            if (divRes.firstChild !== null) {
                divRes.removeChild(divRes.firstChild);
                divRes.appendChild(tabla);
            } else {
                divRes.appendChild(tabla);
            }
            if (divMsg.firstChild !== null) {
                divMsg.removeChild(divMsg.firstChild);
                divMsg.appendChild(mensaje);
            } else {
                divMsg.appendChild(mensaje);
            }
        }
    });
}

function eliminarPartidos(idDivMsg, idDivRes) {
    $.get('/administrador/eliminarPartidos', function (res, req) {
        var divMsg = document.getElementById(idDivMsg);
        var divRes = document.getElementById(idDivRes);
        var mensaje = document.createTextNode(res.msg);
        if (divMsg.firstChild !== null) {
            divMsg.removeChild(divMsg.firstChild);
            divMsg.appendChild(mensaje);
        } else {
            divMsg.appendChild(mensaje);
        }
        var vacio = document.createTextNode(" ");
        if (divRes.firstChild !== null) {
            divRes.removeChild(divRes.firstChild);
            divRes.appendChild(vacio);
        } else {
            divRes.appendChild(vacio);
        }
    });
}

function asignarEditor(idPartido, idDivMsg, idDivRes) {
    var tfecha = document.getElementById("textFecha").value;
    var thora = document.getElementById("textHora").value;
    var selEditor = document.getElementById("selectEditor").value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.post('/administrador/asignarEditores', {"id": idPartido, "fecha": tfecha, "hora": thora, "editor": selEditor}, function (res, req) {
        var divMsg = document.getElementById(idDivMsg);
        var mensaje = document.createTextNode(res.msg);

        if (res.cod === "OK") {
            var fecha = document.getElementById("fecha" + idPartido);
            var hora = document.getElementById("hora" + idPartido);
            var editor = document.getElementById("editor" + idPartido);
            var status = document.getElementById("status" + idPartido);

            fecha.removeChild(fecha.firstChild);
            fecha.appendChild(document.createTextNode(tfecha));
            hora.removeChild(hora.firstChild);
            hora.appendChild(document.createTextNode(thora));
            editor.removeChild(editor.firstChild);
            editor.appendChild(document.createTextNode(selEditor));
            status.removeChild(status.firstChild);
            status.appendChild(document.createTextNode("OK"));
        } else {
            var status = document.getElementById("status" + idPartido);
            status.removeChild(status.firstChild);
            status.appendChild(document.createTextNode("FAIL"));
        }
        if (divMsg.firstChild !== null) {
            divMsg.removeChild(divMsg.firstChild);
            divMsg.appendChild(mensaje);
        } else {
            divMsg.appendChild(mensaje);
        }
    });
}

function modalAdvertenciaGruposAdmin(idDivMsg, idDivRes) {
    var boton = document.getElementById("botonConfirmar");
    boton.setAttribute("onclick", "eliminarGrupos('" + idDivMsg + "', '" + idDivRes + "')");
}

function modalAdvertenciaPartidosAdmin(idDivMsg, idDivRes) {
    var boton = document.getElementById("botonConfirmar");
    boton.setAttribute("onclick", "eliminarPartidos('" + idDivMsg + "', '" + idDivRes + "')");
}

function modalAdvertenciaUltimoJugadorAdmin(idDivMsg, idDivRes) {
    var boton = document.getElementById("botonConfirmarUJ");
    boton.setAttribute("onclick", "eliminarUltimoJugador('" + idDivMsg + "', '" + idDivRes + "')");
}

function modalAdvertenciaJugadoresAdmin(idDivMsg, idDivRes) {
    var boton = document.getElementById("botonConfirmarJ");
    boton.setAttribute("onclick", "eliminarJugadores('" + idDivMsg + "', '" + idDivRes + "')");
}

function modalPartidosAdmin(idPartido, idDivMsg, idDivRes) {
    var titulo = document.getElementById("tituloVentana");
    titulo.removeChild(titulo.firstChild);
    titulo.appendChild(document.createTextNode(idPartido));
    var boton = document.getElementById("botonModal");
    boton.setAttribute("onclick", "asignarEditor('" + idPartido + "', '" + idDivMsg + "', '" + idDivRes + "')");
}