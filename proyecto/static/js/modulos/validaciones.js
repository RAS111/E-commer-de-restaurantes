function validarDatos() {
    var divMensajeError = $("#mensajeError");
    var descripcion = $("#txtDescripcion").val();
    var directorio = $("#txtDirectorio").val();

    if (descripcion.trim() == "") {
        divMensajeError.html("<font color='red'>La descripción no debe estar vacio</font><br><br>");
        return;
    } else if (descripcion.length < 3) {
        divMensajeError.html("<font color='red'>La descripción debe contener al menos 3 caracteres</font><br><br>");
        return;
    }

    if (directorio.trim() == "") {
        divMensajeError.html("<font color='red'>El directorio no debe estar vacio</font><br><br>");
        return;
    } else if (directorio.length < 3) {
        divMensajeError.html("<font color='red'>El directorio debe contener al menos 3 caracteres</font><br><br>");
        return;
    }

    var form = $("#frmDatos");
    form.submit();
}