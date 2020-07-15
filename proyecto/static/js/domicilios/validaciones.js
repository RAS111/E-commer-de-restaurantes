function validarDatos() {
    var altura = document.getElementById("txtAltura").value;
    var calle = document.getElementById("txtCalle").value;
    var casa = document.getElementById("txtCasa").value;
    var barrio = document.getElementById("cboBarrio").value;
    
    // NUMERO DE ALTURA
    if (altura.trim() == "") {
        alert("el numero de altura no debe estar vacio");
        return;
    }

    // NOMBRE DE LA CALLE
    if (calle.trim() == "" ) {
        alert("el nombre de la calle no debe estar vacio");
        return;
    } else if (calle.length < 4) {
        alert("el nombre de la calle debe contener al menos 4 caracteres");
        return;
    }

    // BARRIO
    if(barrio == 0){
        alert("Debe seleccionar el barrio")
    }

     // NUMERO DE CASA
    if (casa.trim() == "") {
        alert("el numero de la casa no debe estar vacia");
        return;
    } 

    var form = document.getElementById("frmDatos");
    form.submit();
}
