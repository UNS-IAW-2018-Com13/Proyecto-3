function asignarJugador(idCuerpoTabla){
    var tabla = document.getElementById(idCuerpoTabla);
    var boton = tabla.lastChild;
    tabla.removeChild(boton);
    var nuevaCelda = document.createElement("td");
    var nuevaFila = document.createElement("tr");
    var texto = document.createTextNode("Jugador");
    nuevaCelda.appendChild(texto);
    nuevaFila.appendChild(nuevaCelda);
    tabla.appendChild(nuevaFila);
    tabla.appendChild(boton);
}