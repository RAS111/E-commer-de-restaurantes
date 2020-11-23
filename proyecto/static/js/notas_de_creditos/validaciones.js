function validarDatos() {
    
    var motivo = document.getElementById("cboMotivo").value;
    var observacion = document.getElementById("txtObservacion").value;

    if(motivo == 0){
        alert("Debe seleccionar el motivo");
        return;
    }

    if (observacion.trim() == "") {
        alert("La observacion  no debe estar vacio");
        return;
    }

    var form = document.getElementById("frmDatos");
    form.submit();
}