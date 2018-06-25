
function completarModalEditor(id, j1, j2, mazosJ1, mazosJ2) {
    var titulo = document.getElementById("tituloVentana");
    titulo.removeChild(titulo.firstChild);
    titulo.appendChild(document.createTextNode(id));
    for (var i = 1; i < 6; i++) {
        var selGR = document.getElementById("textGR" + i);
        while (selGR.hasChildNodes()) {
            selGR.removeChild(selGR.firstChild);
        }
        var selMGR = document.getElementById("textMGR" + i);
        while (selMGR.hasChildNodes()) {
            selMGR.removeChild(selMGR.firstChild);
        }
        var selMPR = document.getElementById("textMPR" + i);
        while (selMPR.hasChildNodes()) {
            selMPR.removeChild(selMPR.firstChild);
        }

        var opSelJ = document.createElement("option");
        opSelJ.selected;
        opSelJ.appendChild(document.createTextNode("Seleccionar..."));

        var opJ1 = document.createElement("option");
        opJ1.setAttribute("value", "1");
        opJ1.appendChild(document.createTextNode(j1));

        var opJ2 = document.createElement("option");
        opJ2.setAttribute("value", "2");
        opJ2.appendChild(document.createTextNode(j2));

        selGR.appendChild(opSelJ);
        selGR.appendChild(opJ1);
        selGR.appendChild(opJ2);

        var opSelMG = document.createElement("option");
        opSelMG.selected;
        opSelMG.appendChild(document.createTextNode("Seleccionar..."));

        var opGM1J1 = document.createElement("option");
        opGM1J1.setAttribute("value", "11");
        opGM1J1.appendChild(document.createTextNode(j1 + " " + mazosJ1[0]));
        var opGM2J1 = document.createElement("option");
        opGM2J1.setAttribute("value", "12");
        opGM2J1.appendChild(document.createTextNode(j1 + " " + mazosJ1[1]));
        var opGM3J1 = document.createElement("option");
        opGM3J1.setAttribute("value", "13");
        opGM3J1.appendChild(document.createTextNode(j1 + " " + mazosJ1[2]));

        var opGM1J2 = document.createElement("option");
        opGM1J2.setAttribute("value", "21");
        opGM1J2.appendChild(document.createTextNode(j2 + " " + mazosJ2[0]));
        var opGM2J2 = document.createElement("option");
        opGM2J2.setAttribute("value", "22");
        opGM2J2.appendChild(document.createTextNode(j2 + " " + mazosJ2[1]));
        var opGM3J2 = document.createElement("option");
        opGM3J2.setAttribute("value", "23");
        opGM3J2.appendChild(document.createTextNode(j2 + " " + mazosJ2[2]));

        selMGR.appendChild(opSelMG);
        selMGR.appendChild(opGM1J1);
        selMGR.appendChild(opGM2J1);
        selMGR.appendChild(opGM3J1);
        selMGR.appendChild(opGM1J2);
        selMGR.appendChild(opGM2J2);
        selMGR.appendChild(opGM3J2);

        var opSelMP = document.createElement("option");
        opSelMP.selected;
        opSelMP.appendChild(document.createTextNode("Seleccionar..."));

        var opPM1J1 = document.createElement("option");
        opPM1J1.setAttribute("value", "11");
        opPM1J1.appendChild(document.createTextNode(j1 + " " + mazosJ1[0]));
        var opPM2J1 = document.createElement("option");
        opPM2J1.setAttribute("value", "12");
        opPM2J1.appendChild(document.createTextNode(j1 + " " + mazosJ1[1]));
        var opPM3J1 = document.createElement("option");
        opPM3J1.setAttribute("value", "13");
        opPM3J1.appendChild(document.createTextNode(j1 + " " + mazosJ1[2]));

        var opPM1J2 = document.createElement("option");
        opPM1J2.setAttribute("value", 21);
        opPM1J2.appendChild(document.createTextNode(j2 + " " + mazosJ2[0]));
        var opPM2J2 = document.createElement("option");
        opPM2J2.setAttribute("value", "22");
        opPM2J2.appendChild(document.createTextNode(j2 + " " + mazosJ2[1]));
        var opPM3J2 = document.createElement("option");
        opPM3J2.setAttribute("value", "23");
        opPM3J2.appendChild(document.createTextNode(j2 + " " + mazosJ2[2]));

        selMPR.appendChild(opSelMP);
        selMPR.appendChild(opPM1J1);
        selMPR.appendChild(opPM2J1);
        selMPR.appendChild(opPM3J1);
        selMPR.appendChild(opPM1J2);
        selMPR.appendChild(opPM2J2);
        selMPR.appendChild(opPM3J2);
    }
    var boton = document.getElementById("botonModal");
    boton.setAttribute("onclick", "actualizarTablaPartidosEditor('" + id + "')");
}

function actualizarTablaPartidosEditor(id) {
    var tr1 = document.getElementById("textGR1").value;
    var tmgr1 = document.getElementById("textMGR1").value;
    var tmpr1 = document.getElementById("textMPR1").value;
    var tr2 = document.getElementById("textGR2").value;
    var tmgr2 = document.getElementById("textMGR2").value;
    var tmpr2 = document.getElementById("textMPR2").value;
    var tr3 = document.getElementById("textGR3").value;
    var tmgr3 = document.getElementById("textMGR3").value;
    var tmpr3 = document.getElementById("textMPR3").value;
    var tr4 = document.getElementById("textGR4").value;
    var tmgr4 = document.getElementById("textMGR4").value;
    var tmpr4 = document.getElementById("textMPR4").value;
    var tr5 = document.getElementById("textGR5").value;
    var tmgr5 = document.getElementById("textMGR5").value;
    var tmpr5 = document.getElementById("textMPR5").value;
    var tcom = document.getElementById("textComent").value;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post('/editor/editarPartido', {"id": id, "com": tcom,
        "rounds": [{"ganador": tr1, "mazoG": tmgr1, "mazoP": tmpr1},
            {"ganador": tr2, "mazoG": tmgr2, "mazoP": tmpr2},
            {"ganador": tr3, "mazoG": tmgr3, "mazoP": tmpr3},
            {"ganador": tr4, "mazoG": tmgr4, "mazoP": tmpr4},
            {"ganador": tr5, "mazoG": tmgr5, "mazoP": tmpr5}]}, function (res, req) {

        if (res.cod === "OK") {
            var tr1 = res.rounds[0].ganador;
            var tmgr1 = res.rounds[0].mazoG;
            var tmpr1 = res.rounds[0].mazoP;
            var tr2 = res.rounds[1].ganador;
            var tmgr2 = res.rounds[1].mazoG;
            var tmpr2 = res.rounds[1].mazoP;
            var tr3 = res.rounds[2].ganador;
            var tmgr3 = res.rounds[2].mazoG;
            var tmpr3 = res.rounds[2].mazoP;
            var tr4 = res.rounds[3].ganador;
            var tmgr4 = res.rounds[3].mazoG;
            var tmpr4 = res.rounds[3].mazoP;
            var tr5 = res.rounds[4].ganador;
            var tmgr5 = res.rounds[4].mazoG;
            var tmpr5 = res.rounds[4].mazoP;
            var tcom = res.coment;

            var r1 = document.getElementById("R1" + id);
            var mgr1 = document.getElementById("MGR1" + id);
            var mpr1 = document.getElementById("MPR1" + id);
            var r2 = document.getElementById("R2" + id);
            var mgr2 = document.getElementById("MGR2" + id);
            var mpr2 = document.getElementById("MPR2" + id);
            var r3 = document.getElementById("R3" + id);
            var mgr3 = document.getElementById("MGR3" + id);
            var mpr3 = document.getElementById("MPR3" + id);
            var r4 = document.getElementById("R4" + id);
            var mgr4 = document.getElementById("MGR4" + id);
            var mpr4 = document.getElementById("MPR4" + id);
            var r5 = document.getElementById("R5" + id);
            var mgr5 = document.getElementById("MGR5" + id);
            var mpr5 = document.getElementById("MPR5" + id);
            var com = document.getElementById("COM" + id);
            var stat = document.getElementById("STAT" + id);

            r1.replaceChild(document.createTextNode(tr1), r1.firstChild);
            mgr1.replaceChild(document.createTextNode(tmgr1), mgr1.firstChild);
            mpr1.replaceChild(document.createTextNode(tmpr1), mpr1.firstChild);
            r2.replaceChild(document.createTextNode(tr2), r2.firstChild);
            mgr2.replaceChild(document.createTextNode(tmgr2), mgr2.firstChild);
            mpr2.replaceChild(document.createTextNode(tmpr2), mpr2.firstChild);
            r3.replaceChild(document.createTextNode(tr3), r3.firstChild);
            mgr3.replaceChild(document.createTextNode(tmgr3), mgr3.firstChild);
            mpr3.replaceChild(document.createTextNode(tmpr3), mpr3.firstChild);
            r4.replaceChild(document.createTextNode(tr4), r4.firstChild);
            mgr4.replaceChild(document.createTextNode(tmgr4), mgr4.firstChild);
            mpr4.replaceChild(document.createTextNode(tmpr4), mpr4.firstChild);
            r5.replaceChild(document.createTextNode(tr5), r5.firstChild);
            mgr5.replaceChild(document.createTextNode(tmgr5), mgr5.firstChild);
            mpr5.replaceChild(document.createTextNode(tmpr5), mpr5.firstChild);
            com.replaceChild(document.createTextNode(tcom), com.firstChild);
            stat.replaceChild(document.createTextNode(res.cod), stat.firstChild);

            var divMsg = document.getElementById("divMensajes");
            if (divMsg.firstChild !== null) {
                divMsg.removeChild(divMsg.firstChild);
                divMsg.appendChild(document.createTextNode(res.msg));
            } else {
                divMsg.appendChild(document.createTextNode(res.msg));
            }

        } else {
            var stat = document.getElementById("STAT" + id);
            stat.removeChild(stat.firstChild);
            stat.appendChild(document.createTextNode("FAIL"));
            var divMsg = document.getElementById("divMensajes");
            if (divMsg.firstChild !== null) {
                divMsg.removeChild(divMsg.firstChild);
                divMsg.appendChild(document.createTextNode(res.msg));
            } else {
                divMsg.appendChild(document.createTextNode(res.msg));
            }
        }
    });
}