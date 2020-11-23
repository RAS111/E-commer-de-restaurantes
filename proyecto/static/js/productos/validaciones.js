function validarDatos() {
    var nombre = document.getElementById("txtNombre").value;
    var precio = document.getElementById("txtPrecio").value;
    var stockMinimo = document.getElementById("txtStockMinimo").value;
    var stockActual = document.getElementById("txtStockActual").value;
    var stockMaximo = document.getElementById("txtStockMaximo").value;
    var rubro = document.getElementById("cboRubro").value;
    
    // NOMBRE
    if (nombre.trim() == "") {
        alert("El nombre no debe estar vacio");
        return;
    } else if (nombre.length < 3 ) {
        alert("El nombre debe contener al menos 3 caracteres");
        return;
    }

    // PRECIO
    if (precio.trim() == "" ) {
        alert("el precio no debe estar vacio");
        return;
    } 

     // STOCK
    if (stockMinimo.trim() == "") {
        alert("la cantidad de stock minima no debe estar vacia");
        return;
    } 

    if (stockActual.trim() == "") {
        alert("la cantidad de stock actual no debe estar vacia");
        return;
    } 

    if (stockMaximo.trim() == "") {
        alert("la cantidad de stock maximo no debe estar vacia");
        return;
    } 

    // TIPO DOCUMENTO
    if(rubro == 0){
        alert("Debe seleccionar el rubro")
    }

    var form = document.getElementById("frmDatos");
    form.submit();
}
