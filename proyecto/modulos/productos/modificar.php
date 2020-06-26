<?php

require_once '../../class/Producto.php';

$id = $_GET['id'];

$producto = Producto::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Producto</title>
</head>
<body>
	
	<h1>Modificar Producto</h1>
	
	<form name="frmDatos" method="POST" action="procesar/modificar.php">

		<input type="hidden" name="txtId" value="<?=$producto->getIdProducto(); ?>">

	    <label>Nombre:</label>
		<input type="text" name="txtNombre" value="<?=$producto->getNombre(); ?>">
		<br><br> <!-- Este es un comentario -->

		<label>Precio:</label>
		<input type="number" name="numPrecio" value="<?=$producto->getPrecio(); ?>">
		<br><br>

		<label>Stock Minimo:</label>
		<input type="number" name="numStockMinimo" value="<?=$producto->getStockMinimo(); ?>">
		<br><br>

		<label>Stock Actual:</label>
		<input type="number" name="numStockActual"value="<?=$producto->getStockActual(); ?>">
		<br><br> <!-- Salto de lineas -->

		<label>Stock Maximo:</label>
		<input type="number" name="numStockMaximo"value="<?=$producto->getStockMaximo(); ?>">
		<br><br> <!-- Salto de lineas -->

		<label>Rubro: </label>
		<select name="cboTipoDocumento">
			<option value="0">Seleccionar</option>
		</select>
		<br><br> <!-- Salto de lineas -->

		<input type="submit" name="btnActualizar" value="Actualizar">			
	</form>
	<br>
	<?php require_once '../../menu.php';?>
</body>
</html>