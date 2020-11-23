function validarDatos() {
    var cantidad = document.getElementById("txtCantidad").value;
    var producto = document.getElementById("cboProducto").value;
    
    if (cantidad.trim() == "") {
        alert("La cantidad no debe estar vacia");
        return;
    }

    if(producto == 0){
        alert("Debe seleccionar el rubro");
        return
    }

    var form = document.getElementById("frmDatos");
    form.submit();
}
