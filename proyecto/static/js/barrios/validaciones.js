function validarDatos() {
    
    var nombre = document.getElementById("txtNombre").value;
   
    if (nombre.trim() == "") {
        alert("El nombre no debe estar vacio");
        return;
    } else if (nombre.length < 3 ) {
        alert("El nombre debe contener al menos 3 caracteres");
        return;
    }

    var form = document.getElementById("frmDatos");
    form.submit();
}