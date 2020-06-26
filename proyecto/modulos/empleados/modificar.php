<?php

require_once '../../class/Empleado.php';
require_once '../../class/TipoDocumento.php';


$id = $_GET['id'];

$empleado = Empleado::obtenerPorId($id);

$listadoTipoDocumento = TipoDocumento::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Empleado</title>
</head>
<body>

	<h1>Modificar Empleado</h1>
	
	<form name="frmDatos" method="POST" action="procesar/modificar.php">

		<input type="hidden" name="txtId" value="<?= $empleado->getIdEmpleado(); ?>">

	    <label>Nombre:</label>
		<input type="text" name="txtNombre" value="<?= $empleado->getNombre(); ?>">
		<br><br> <!-- Este es un comentario -->

		<label>Apellido:</label>
		<input type="text" name="txtApellido" value="<?= $empleado->getApellido(); ?>">
		<br><br>

		<label>Sexo:</label>
		<input type="text" name="txtSexo" value="<?= $empleado->getSexo(); ?>">
		<br><br>

		<label>Fecha Nacimiento:</label>
		<input type="date" name="txtFechaNacimiento" value="<?= $empleado->getFechaNacimiento(); ?>">
		<br><br> <!-- Salto de lineas -->

		<label>Tipo Documento: </label>
		<select name="cboTipoDocumento">
			<option value="0">Seleccionar</option>

			<?php
			foreach ($listadoTipoDocumento as $tipoDocumento):
				$selected = '';
				if ($empleado->getIdTipoDocumento() == $tipoDocumento->getIdTipoDocumento()) {
					$selected = "SELECTED";
				}
			?>

				<option value="<?php echo $tipoDocumento->getIdTipoDocumento(); ?>" <?php echo $selected; ?>>
					<?php echo $tipoDocumento; ?>
				</option>

			<?php endforeach ?>

		</select>
		<br><br> <!-- Salto de lineas -->

		<label>Numero Documento:</label>
		<input type="text" name="txtNumeroDocumento" value="<?= $empleado->getNumeroDocumento(); ?>">
		<br><br> <!-- Salto de lineas -->


		<input type="submit" name="btnGuardar" value="Actualizar">			

	</form>
	<br>
	<?php require_once '../../menu.php';?>
</body>
</html>