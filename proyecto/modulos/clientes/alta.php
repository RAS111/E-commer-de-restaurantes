<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Cliente</title>
</head>
<body>

	<h1>Registar Cliente</h1>
	
	<form name="frmDatos" method="POST" action="procesar/guardar.php">

	    <label>Nombre:</label>
		<input type="text" name="txtNombre">
		<br><br> <!-- Este es un comentario -->

		<label>Apellido:</label>
		<input type="text" name="txtApellido">
		<br><br>

		<label>Sexo:</label>
		<input type="text" name="txtSexo">
		<br><br>

		<label>Fecha Nacimiento:</label>
		<input type="date" name="txtFechaNacimiento">
		<br><br> <!-- Salto de lineas -->

		<label>Tipo Documento: </label>
		<select name="cboTipoDocumento">
			<option value="0">Seleccionar</option>
		</select>
		<br><br> <!-- Salto de lineas -->

		<label>Numero Documento:</label>
		<input type="text" name="txtNumeroDocumento">
		<br><br> <!-- Salto de lineas -->

		<input type="submit" name="btnGuardar" value="Guardar">			
	</form>
	<!--<?php require_once '../../menu.php';?>-->
</body>
</html>