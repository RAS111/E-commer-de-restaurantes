<?php

require_once '../../class/Cliente.php';

$id = $_GET['id'];

$cliente = Cliente::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Cliente</title>
</head>
<body>
	
	<h1>Modificar Cliente</h1>
	
	<form name="frmDatos" method="POST" action="procesar/modificar.php">

		<input type="hidden" name="txtId" value="<?=$cliente->getIdCliente(); ?>">

	    <label>Nombre:</label>
		<input type="text" name="txtNombre" value="<?=$cliente->getNombre(); ?>">
		<br><br> <!-- Este es un comentario -->

		<label>Apellido:</label>
		<input type="text" name="txtApellido" value="<?=$cliente->getApellido(); ?>">
		<br><br>

		<label>Sexo:</label>
		<input type="text" name="txtSexo" value="<?=$cliente->getSexo(); ?>">
		<br><br>

		<label>Fecha Nacimiento:</label>
		<input type="date" name="txtFechaNacimiento" value="<?=$cliente->getFechaNacimiento(); ?>">
		<br><br> <!-- Salto de lineas -->

		<label>Tipo Documento: </label>
		<select name="cboTipoDocumento">
			<option value="0">Seleccionar</option>
		</select>
		<br><br> <!-- Salto de lineas -->

		<label>Numero Documento:</label>
		<input type="text" name="txtNumeroDocumento" value="<?=$cliente->getNumeroDocumento(); ?>">
		<br><br> <!-- Salto de lineas -->


		 <input type="submit" name="btnGuardar" value="Actualizar">			
	</form>
	<!--<?php require_once '../../menu.php';?>-->
</body>
</html>