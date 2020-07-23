<?php

require_once '../../class/perfil.php';
require_once "../../class/Modulo.php";

const SIN_ACCION = 0;
const PERFIL_GUARDADO = 1;
const PERFIL_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoPerfil = Perfil::obtenerTodos();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado Perfiles</title>
</head>
<body>

	<?php require_once '../../menu.php';?>
	<h1>Listado de Perfiles </h1>

	<a href="alta.php">
		<img src="../../imagenes/iconos/add.png" title="Agregar Perfil Modulo">
	</a>
	<br><br>
	
	<?php if($mensaje == PERFIL_GUARDADO):?>
		<h3>Perfil Guardado</h3>
		<br>
	<?php elseif($mensaje == PERFIL_MODIFICADO):?>
		<h3>Perfil Modificado</h3>
		<br>
	<?php  endif;?>

	<table border="1">
		<tr>
			<th>Perfil</th>
			<th>Descripcion</th>
			
			<th>Accion</th>
		</tr>

		<?php foreach ($listadoPerfil as $perfil): ?>

			<tr>
				<td> <?= $perfil->getIdPerfil(); ?> </td>
				<td> <?= $perfil->getDescripcion(); ?> </td>
				<td>
					<a href="detalle.php?id=<?=$perfil->getIdPerfil();?>">
						<img src="../../imagenes/iconos/view.png" title="Ver Perfil">
					</a>
					-
					<a href="modificar.php?id=<?=$perfil->getIdPerfil();?>">
						<img src="../../imagenes/iconos/update.png" title="Modificar Perfil">
					</a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>
	<br>
	
</body>
</html>