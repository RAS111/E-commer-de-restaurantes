function validarDatos() {
    var nombre = document.getElementById("txtNombre").value;
    var apellido = document.getElementById("txtApellido").value;
    var sexo = document.getElementById("cboSexo").value;
    var fechaNacimiento = document.getElementById("txtFechaNacimiento").value;
    var tipoDocumento = document.getElementById("cboTipoDocumento").value;
    var numeroDocumento = document.getElementById("txtNumeroDocumento").value;
   
    if (nombre.trim() == "") {
        alert("El nombre no debe estar vacio");
        return;
    } else if (nombre.length < 3 ) {
        alert("El nombre debe contener al menos 3 caracteres");
        return;
    } else if(!isNaN(nombre)) {
        alert("El nombre no puede contener numeros");
        return;
    }

    if (apellido.trim() == "" ) {
        alert("El apellido no debe estar vacio");
        return;
    } else if (apellido.length < 3) {
        alert("El apellido debe contener al menos 3 caracteres");
        return;
    }

    if(sexo == 0){
        alert("Debe seleccionar el sexo");
        return;
    }


    if(tipoDocumento == 0){
        alert("Debe seleccionar el documento");
        return;
    }

    if (numeroDocumento.trim() == "") {
        alert("El numero de documento no debe estar vacio");
        return;
    } else if(numeroDocumento.length < 8) {
        alert("el numero de documento debe contener al menos 8 caracteres");
        return;
    }

    var form = document.getElementById("frmDatos");
    form.submit();
}
