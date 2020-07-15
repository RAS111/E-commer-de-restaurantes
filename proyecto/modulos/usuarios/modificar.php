<?php

require_once '../../class/Usuario.php';
require_once '../../class/TipoDocumento.php';

$id = $_GET['id'];

$user = Usuario::obtenerPorId($id);

$listadoTipoDocumento = TipoDocumento::obtenerTodos();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modificar Usuario</title>
	<script src="../../static/js/usuarios/validaciones.js"></script>
</head>
<body>
	<?php require_once '../../menu.php';?>
	<h1>Modificar de Usuarios</h1>
	
	<?php if (isset($_SESSION['mensaje_error'])) : ?>

	    <font color="red">
	       	<?php echo $_SESSION['mensaje_error'] ?>
	    </font>

        <br><br>

    <?php
           	unset($_SESSION['mensaje_error']);
        endif;
    ?>

	<form name="frmDatos" id="frmDatos" method="POST" action="procesar/modificar.php">

		<input type="hidden" name="txtId" value="<?= $user->getIdUsuario(); ?>">

	    <label>Nombre:</label>
		<input type="text" name="txtNombre" id="txtNombre" value="<?= $user->getNombre(); ?>">
		<br><br> <!-- Este es un comentario -->

		<label>Apellido:</label>
		<input type="text" name="txtApellido" id="txtApellido"  value="<?= $user->getApellido(); ?>">
		<br><br>

		<label>Sexo:</label>
		<input type="text" name="txtSexo" id="txtSexo" value="<?= $user->getSexo(); ?>">
		<br><br>

		<label>Fecha Nacimiento:</label>
		<input type="date" name="txtFechaNacimiento" id="txtFechaNacimiento" value="<?= $user->getFechaNacimiento(); ?>">
		<br><br> <!-- Salto de lineas -->

		<label>Tipo Documento: </label>
		<select name="cboTipoDocumento" id="cboTipoDocumento">
			<option value="0">Seleccionar</option>

			<?php
			foreach ($listadoTipoDocumento as $tipoDocumento):
				$selected = '';
				if ($user->getIdTipoDocumento() == $tipoDocumento->getIdTipoDocumento()) {
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
		<input type="text" name="txtNumeroDocumento" id="txtNumeroDocumento" value="<?= $user->getNumeroDocumento(); ?>">
		<br><br> <!-- Salto de lineas -->

		<label>Nombre de usuario:</label>
		<input type="text" name="txtNombreUsuario" id="txtNombreUsuario" value="<?= $user->getUsername(); ?>">
		<br><br> <!-- Salto de lineas -->

		<label>Contraseña</label>
		<input type="password" name="txtContraseña" id="txtContraseña" value="<?= $user->getPassword(); ?>">
		<br><br> <!-- Salto de lineas -->

		<input type="button" value="Actualizar" onclick="validarDatos();">					

	</form>
	
</body>
</html>