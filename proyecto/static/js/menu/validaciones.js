function validarDatos() {
    var nombre = document.getElementById("txtNombre").value;
    var precio = document.getElementById("txtPrecio").value;
    var rubro = document.getElementById("cboRubro").value;
   
    if (nombre.trim() == "") {
        alert("El nombre no debe estar vacio");
        return;
    } else if (nombre.length < 3 ) {
        alert("El nombre debe contener al menos 3 caracteres");
        return;
    }

    if (precio.trim() == "" ) {
        alert("el precio no debe estar vacio");
        return;
    } 

    if(rubro == 0){
        alert("Debe seleccionar el rubro");
        return;
    }

    var form = document.getElementById("frmDatos");
    form.submit();
}
