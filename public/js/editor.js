
function completarModalEditor(id) {
    var titulo = document.getElementById("tituloVentana");
    titulo.removeChild(titulo.firstChild);
    titulo.appendChild(document.createTextNode(id));
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
        if (res.hasOwnProperty("msg")) {
            if (res.msg === "ok") {
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
                stat.replaceChild(document.createTextNode(res.msg), stat.firstChild);
            } else {
                var status = document.getElementById("STAT" + id);
                status.removeChild(status.firstChild);
                status.appendChild(document.createTextNode(res.msg));
            }
        } else {
            var status = document.getElementById("STAT" + id);
            status.removeChild(status.firstChild);
            status.appendChild(document.createTextNode("ERROR"));
        }
    });
}