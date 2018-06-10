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
            tabla.setAttribute("class","table");
            tabla.setAttribute("class","table-striped");
            
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
            
            for(var i = 0; i < 4; i++){
                var filaBody = document.createElement("tr");
                for(var j = 0; j < 4; j++){
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