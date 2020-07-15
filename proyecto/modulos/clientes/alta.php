<?php

require_once '../../class/TipoDocumento.php';

$listadoTipoDocumento = TipoDocumento::obtenerTodos();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<!--<link rel="stylesheet" type="text/css" href="../../static/css/style2.css">-->
	<script src="../../static/js/clientes-empleados/validaciones.js"></script>
</head>
<body>

	<?php require_once '../../menu.php';?>
	<h1>Registar Cliente</h1>
	<div class="contenedor">
      	<?php if (isset($_SESSION['mensaje_error'])) : ?>

	        <font color="red">
	        	<?php echo $_SESSION['mensaje_error'] ?>
	        </font>

        <br><br>

        <?php
           		unset($_SESSION['mensaje_error']);
            endif;
        ?>
    <div class="input-contenedor">
	<form name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">

		<div class="input-contenedor">

		<input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre">
		<br><br> <!-- Este es un comentario -->

		<div class="input-contenedor">

		<input type="text" name="txtApellido" id="txtApellido" placeholder="Apellido">
		<br><br>

		<div class="input-contenedor">

		<label>Sexo: </label>
		<select name="cboSexo" id="txtSexo">
			<option value="0">Seleccionar</option>
			<option value="F">Femenino</option>
			<option value="M">Masculino</option>
			<option value="Otro">Otro</option>
		</select>
		

		<div class="input-contenedor">
		<label>Fecha Nacimiento:</label>
		<input type="date" name="txtFechaNacimiento">
		<br><br> <!-- Salto de lineas -->

		<div class="input-contenedor">
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

		<div class="input-contenedor">

		<input type="text" name="txtNumeroDocumento" id="txtNumeroDocumento" placeholder="Numero Documento">
		<br><br> <!-- Salto de lineas -->

		<input type="button" value="Guardar" onclick="validarDatos();">			
	</form>
	<br>
	
</body>
</html>