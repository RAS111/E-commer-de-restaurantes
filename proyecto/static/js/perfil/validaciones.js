function validarDatos() {
    var descripcion = document.getElementById("txtDescripcion").value;
    var modulo = document.getElementById("cboModulos").value;
    

    if (descripcion.trim() == "") {
        alert("La descripcion no debe estar vacio");
        return;
    } else if (descripcion.length < 3 ) {
        alert("La descripcion debe contener al menos 3 caracteres");
        return;
    }


    if(modulo == 0){
        alert("Debe seleccionar el modulo");
        return;
    }

    var form = document.getElementById("frmDatos");
    form.submit();
}
