function validarDatos() {
    var nombre = document.getElementById("txtNombre").value;
    var apellido = document.getElementById("txtApellido").value;
    var tipoDocumento = document.getElementById("cboTipoDocumento").value;
    var numeroDocumento = document.getElementById("txtNumeroDocumento").value;
    var username = document.getElementById("txtNombreUsuario").value;


    // NOMBRE
    if (nombre.trim() == "") {
        alert("El nombre no debe estar vacio");
        return;
    } else if (nombre.length < 3 ) {
        alert("El nombre debe contener al menos 3 caracteres");
        return;
    }

    // APELLIDO
    if (apellido.trim() == "" ) {
        alert("El apellido no debe estar vacio");
        return;
    } else if (apellido.length < 3) {
        alert("El apellido debe contener al menos 3 caracteres");
        return;
    }

    // TIPO DOCUMENTO
    if(tipoDocumento == 0){
        alert("Debe seleccionar el documento")
    }

     // NUMERO DOCUMENTO
    if (numeroDocumento.trim() == "") {
        alert("El numero de documento no debe estar vacio");
        return;
    } else if(numeroDocumento.length < 8) {
        alert("el numero de documento debe contener al menos 8 caracteres");
        return;
    }

    // USERNAME
     if (username.trim() == "") {
        alert("El nombre de usuario no debe estar vacio");
        return;
    } else if (username.length < 3 ) {
        alert("El nombre de usuario debe contener al menos 3 caracteres");
        return;
    }

    

    var form = document.getElementById("frmDatos");
    form.submit();
}
