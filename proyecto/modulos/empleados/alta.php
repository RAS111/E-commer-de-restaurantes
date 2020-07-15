<?php

require_once '../../class/TipoDocumento.php';

$listadoTipoDocumento = TipoDocumento::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nuevo Empleado</title>
	<script src="../../static/js/clientes-empleados/validaciones.js"></script>
</head>
<body>

	<?php require_once '../../menu.php';?>

	<h1>Registrar Empleado</h1>
		
		<?php if (isset($_SESSION['mensaje_error'])) : ?>

	        <font color="red">
	        	<?php echo $_SESSION['mensaje_error'] ?>
	        </font>

        <br><br>

        <?php
           		unset($_SESSION['mensaje_error']);
            endif;
        ?>

		<form name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">

	        <label>Nombre:</label>
		    <input type="text" name="txtNombre" id="txtNombre">
		    <br><br> <!-- Este es un comentario -->

		    <label>Apellido:</label>
		    <input type="text" name="txtApellido" id="txtApellido">
		    <br><br>

		    <label>Sexo: </label>
			<select name="cboSexo" id="txtSexo">
				<option value="0">Seleccionar</option>
				<option value="F">Femenino</option>
				<option value="M">Masculino</option>
				<option value="Otro">Otro</option>
			</select>
			<br><br>

		    <label>Fecha Nacimiento:</label>
		    <input type="date" name="txtFechaNacimiento" id="txtFechaNacimiento">
			<br><br> <!-- Salto de lineas -->

			<label>Tipo Documento: </label>
			<select name="cboTipoDocumento" id="cboTipoDocumento">
				<option value="0">Seleccionar</option>

				<?php foreach ($listadoTipoDocumento as $tipoDocumento): ?>

					<option value="<?php echo $tipoDocumento->getIdTipoDocumento(); ?>">
						<?php echo $tipoDocumento; ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br> <!-- Salto de lineas -->

		    <label>Numero Documento:</label>
		    <input type="text" name="txtNumeroDocumento" id="txtNumeroDocumento">
			<br><br> <!-- Salto de lineas -->

		    <input type="button" value="Guardar" onclick="validarDatos();">			

		</form>
		<br>

</body>
</html>