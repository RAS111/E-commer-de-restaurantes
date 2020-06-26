<?php

require_once '../../class/Usuario.php';

const SIN_ACCION = 0;
const USUARIO_GUARDADO = 1;
const USUARIO_MODIFICADO = 2;

if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}


$listadoUsuarios = Usuario::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Usuarios</title>
</head>
<body>

	<h1>Listado de Usuarios</h1>
	
	<a href="alta.php">
		<img src="../../imagenes/iconos/add.png" title="Agregar Usuario">
	</a>
	<br><br>

	<?php if($mensaje == USUARIO_GUARDADO):?>
		<h3>Usuario Guardado</h3>
		<br>
	<?php elseif($mensaje == USUARIO_MODIFICADO):?>
		<h3>Usuario Modificado</h3>
		<br>
	<?php  endif;?>

	<table border="1">
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>username</th>
			<th>Acciones</th>
		</tr>

		<?php foreach ($listadoUsuarios as $usuario): ?>

			<tr>
				<td> <?= $usuario->getNombre(); ?> </td>
				<td> <?= $usuario->getApellido(); ?> </td>
				<td> <?= $usuario->getUsername(); ?></td>
				<td>
					<a href="detalle.php?id=<?=$usuario->getIdUsuario();?>">
						<img src="../../imagenes/iconos/view.png" title="Ver Usuario">
					</a>
					-
					<a href="modificar.php?id=<?=$usuario->getIdUsuario();?>">
						<img src="../../imagenes/iconos/update.png" title="Modificar Usuario">
					</a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>
	<br>
	<?php require_once '../../menu.php';?>
</body>
</html>