<?php

require_once '../../class/Menu.php';

$id = $_GET['id'];

$menu = Menu::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Menu</title>
</head>
<body>
	
	<h1>Modificar Menu</h1>
	
	<form name="frmDatos" method="POST" action="procesar/guardar.php">

		<input type="hidden" name="txtId" value="<?=$menu->getIdMenu(); ?>">

	    <label>Nombre:</label>
		<input type="text" name="txtNombre" value="<?=$menu->getNombre(); ?>">
		<br><br> <!-- Este es un comentario -->

		<label>Precio:</label>
		<input type="number" name="numPrecio" value="<?=$menu->getPrecio(); ?>">
		<br><br>

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