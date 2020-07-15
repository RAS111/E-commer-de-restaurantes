<?php

require_once '../../class/PerfilModulo.php';

const SIN_ACCION = 0;
const PERFILMODULO_GUARDADO = 1;
const PERFILMODULO_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoPerfilModulo = PerfilModulo::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado Perfiles Modulos</title>
</head>
<body>

	<?php require_once '../../menu.php';?>
	<h1>Listado de Perfiles Modulos</h1>

	<a href="alta.php">
		<img src="../../imagenes/iconos/add.png" title="Agregar Perfil Modulo">
	</a>
	<br><br>
	
	<?php if($mensaje == PERFILMODULO_GUARDADO):?>
		<h3>Perfil Modulos Guardado</h3>
		<br>
	<?php elseif($mensaje == PERFILMODULO_MODIFICADO):?>
		<h3>Perfil Modulos Modificado</h3>
		<br>
	<?php  endif;?>

	<table border="1">
		<tr>
			<th>Perfil modulo</th>
			<th>Perfil</th>
			<th>Modulo</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listadoPerfilModulo as $perfilModulo): ?>

			<tr>
				<td> <?= $perfilModulo->getIdPerfilModulo(); ?> </td>
				<td> <?= $perfilModulo->getIdPerfil(); ?> </td>
				<td> <?= $perfilModulo->getIdModulo(); ?> </td>
				<td>
					<a href="detalle.php?id=<?=$perfilModulo->getIdPerfilModulo();?>">
						<img src="../../imagenes/iconos/view.png" title="Ver Perfil">
					</a>
					-
					<a href="modificar.php?id=<?=$perfilModulo->getIdPerfilModulo();?>">
						<img src="../../imagenes/iconos/update.png" title="Modificar Perfil">
					</a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>
	<br>
	
</body>
</html>