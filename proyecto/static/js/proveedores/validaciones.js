function validarDatos() {
    var nombre = document.getElementById("txtNombre").value;
    var apellido = document.getElementById("txtApellido").value;
    var tipoDocumento = document.getElementById("cboTipoDocumento").value;
    var numeroDocumento = document.getElementById("txtNumeroDocumento").value;
    var razonSocial = document.getElementById("txtRazonSocial").value;
    var cuil = document.getElementById("txtCuil").value;

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
        alert("Debe seleccionar el documento");
        return;
    }

    // NUMERO DOCUMENTO
    if (numeroDocumento.trim() == "") {
        alert("El numero de documento no debe estar vacio");
        return;
    } else if(numeroDocumento.length < 8) {
        alert("el numero de documento debe contener al menos 8 caracteres");
        return;
    }

    // RAZON SOCIAL
    if(razonSocial.trim() == "") {
        alert("La razon social no debe estar vacia");
        return;
    } else if(razonSocial.length < 3) {
        alert("La razon social debe contener al menos 3 caracteres")
        return;
    }

    // CUIL
    if(cuil.trim() == "") {
        alert("El cuil no debe estar vacio");
        return;
    } else if(cuil.length < 11) {
        alert("el cuil debe contener 11 caracteres para ser valido");
        return;
    }

    var form = document.getElementById("frmDatos");
    form.submit();
}
