<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Producto</title>
</head>
<body>

	<h1>Registar Producto</h1>
	
	<form name="frmDatos" method="POST" action="procesar/guardar.php">

	    <label>Nombre:</label>
		<input type="text" name="txtNombre">
		<br><br> <!-- Este es un comentario -->

		<label>Precio:</label>
		<input type="number" name="numPrecio">
		<br><br>

		<label>Stock Minimo:</label>
		<input type="number" name="numStockMinimo">
		<br><br>

		<label>Stock Actual:</label>
		<input type="number" name="numStockActual">
		<br><br> <!-- Salto de lineas -->

		<label>Stock Maximo:</label>
		<input type="number" name="numStockMaximo">
		<br><br> <!-- Salto de lineas -->

		<label>Rubro: </label>
		<select name="cboTipoDocumento">
			<option value="0">Seleccionar</option>
		</select>
		<br><br> <!-- Salto de lineas -->

		<input type="submit" name="btnGuardar" value="Guardar">			
	</form>
	<br>
	<?php require_once '../../menu.php';?>
</body>
</html>