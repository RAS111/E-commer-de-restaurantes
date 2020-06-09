<?php

require_once '../../class/Usuario.php';

$id = $_GET['id'];

$usuario = Usuario::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Usuario</title>
</head>
<body>

	<h1>Modificar de Usuarios</h1>

	
	<form name="frmDatos" method="POST" action="procesar/modificar.php">

		<input type="hidden" name="txtId" value="<?= $usuario->getIdUsuario(); ?>">

	    <label>Nombre:</label>
		<input type="text" name="txtNombre" value="<?= $usuario->getNombre(); ?>">
		<br><br> <!-- Este es un comentario -->

		<label>Apellido:</label>
		<input type="text" name="txtApellido" value="<?= $usuario->getApellido(); ?>">
		<br><br>

		<label>Sexo:</label>
		<input type="text" name="txtSexo" value="<?= $usuario->getSexo(); ?>">
		<br><br>

		<label>Fecha Nacimiento:</label>
		<input type="date" name="txtFechaNacimiento" value="<?= $usuario->getFechaNacimiento(); ?>">
		<br><br> <!-- Salto de lineas -->

		<label>Tipo Documento: </label>
		<select name="cboTipoDocumento">
			<option value="0">Seleccionar</option>
		</select>
		<br><br> <!-- Salto de lineas -->

		<label>Numero Documento:</label>
		<input type="text" name="txtNumeroDocumento" value="<?= $usuario->getNumeroDocumento(); ?>">
		<br><br> <!-- Salto de lineas -->

		<label>Nombre de usuario:</label>
		<input type="text" name="txtNombreUsuario" value="<?= $usuario->getUsername(); ?>">
		<br><br> <!-- Salto de lineas -->

		<label>Contraseña</label>
		<input type="password" name="txtContraseña" value="<?= $usuario->getPassword(); ?>">
		<br><br> <!-- Salto de lineas -->

		 <input type="submit" name="btnActualizar" value="Actualizar">			

	</form>
	<!--<?php require_once '../../menu.php';?>-->
</body>
</html>