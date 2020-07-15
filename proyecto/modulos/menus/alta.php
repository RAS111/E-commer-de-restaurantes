<?php

require_once '../../class/Rubro.php';

$listadoRubro = Rubro::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nuevo Menu</title>
</head>
<body>
	<?php require_once '../../menu.php';?>
	<h1>Registar Menu</h1>
	
	<form name="frmDatos" method="POST" action="procesar/guardar.php">

	    <label>Nombre:</label>
		<input type="text" name="txtNombre">
		<br><br> <!-- Este es un comentario -->

		<label>Precio:</label>
		<input type="number" name="numPrecio">
		<br><br>

		<label>Rubro: </label>
		<select name="cboRubro">
			<option value="0">Seleccionar</option>
			<?php foreach ($listadoRubro as $rubro): ?>

				<option value="<?php echo $rubro->getIdRubro(); ?>">
					<?php echo $rubro; ?>
				</option>

			<?php endforeach ?>
		</select>
		<br><br> <!-- Salto de lineas -->

		<input type="submit" name="btnGuardar" value="Guardar">			
	</form>
	
</body>
</html>