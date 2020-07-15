<?php

require_once '../../class/Menu.php';
require_once '../../class/Rubro.php';

$id = $_GET['id'];

$menu = Menu::obtenerPorId($id);

$listadoRubro = Rubro::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Menu</title>
</head>
<body>
	<?php require_once '../../menu.php';?>
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
		<select name="cboRubro">
			<option value="0">Seleccionar</option>

			<?php
			foreach ($listadoRubro as $rubro):
				$selected = '';
				if ($menu->getIdRubro() == $rubro->getIdRubro()) {
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