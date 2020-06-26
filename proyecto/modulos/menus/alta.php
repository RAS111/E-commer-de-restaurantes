<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Menu</title>
</head>
<body>

	<h1>Registar Menu</h1>
	
	<form name="frmDatos" method="POST" action="procesar/guardar.php">

	    <label>Nombre:</label>
		<input type="text" name="txtNombre">
		<br><br> <!-- Este es un comentario -->

		<label>Precio:</label>
		<input type="number" name="numPrecio">
		<br><br>

		<label>Rubro: </label>
		<select name="cboTipoDocumento">
			<option value="0">Seleccionar</option>
		</select>
		<br><br> <!-- Salto de lineas -->

		<input type="submit" name="btnGuardar" value="Guardar">			
	</form>
	<?php require_once '../../menu.php';?>
</body>
</html>