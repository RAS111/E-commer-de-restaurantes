function validarDatos() {
    
    var numero = document.getElementById("txtNumero").value;
    var tipoFactura = document.getElementById("cboTipoFactura").value;
    var formaPago = document.getElementById("cboFormaPago").value;

    if (numero.trim() == "") {
        alert("El numero de Factura no debe estar vacio");
        return;
    }

    if(tipoFactura == 0){
        alert("Debe seleccionar el tipo de factura");
        return;
    }

    if(formaPago == 0){
        alert("Debe seleccionar la forma de pago");
        return;
    }


    var form = document.getElementById("frmDatos");
    form.submit();
}