<?php

require_once '../../class/Producto.php';
require_once '../../class/Rubro.php';

$id = $_GET['id'];

$producto = Producto::obtenerPorId($id);

$listadoRubro = Rubro::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modificar Producto</title>
</head>
<body>

	<?php require_once '../../menu.php';?>
	
	<h1>Modificar Producto</h1>
	
	<form name="frmDatos" method="POST" action="procesar/modificar.php">

		<input type="hidden" name="txtId" value="<?=$producto->getIdProducto(); ?>">

	    <label>Nombre:</label>
		<input type="text" name="txtNombre" value="<?=$producto->getNombre(); ?>">
		<br><br> <!-- Este es un comentario -->

		<label>Precio:</label>
		<input type="number" name="numPrecio" value="<?=$producto->getPrecio(); ?>">
		<br><br>

		<label>Stock Actual:</label>
		<input type="number" name="numStockActual"value="<?=$producto->getStockActual(); ?>">
		<br><br> <!-- Salto de lineas -->

		<label>Rubro: </label>
		<select name="cboRubro">
			<option value="0">Seleccionar</option>

			<?php
			foreach ($listadoRubro as $rubro):
				$selected = '';
				if ($producto->getIdRubro() == $rubro->getIdRubro()) {
					$selected = "SELECTED";
				}
			?>

				<option value="<?php echo $rubro->getIdRubro(); ?>" <?php echo $selected; ?>>
					<?php echo $rubro; ?>
				</option>

			<?php endforeach ?>
		</select>
		<br><br> <!-- Salto de lineas -->

		<input type="submit" name="btnActualizar" value="Actualizar">			
	</form>
	<br>
	
</body>
</html>