<?php

require_once '../../class/Barrio.php';

const SIN_ACCION = 0;
const BARRIO_GUARDADO = 1;
const BARRIO_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoBarrio = Barrio::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Barrios</title>
</head>
<body>

	<?php require_once '../../menu.php';?>
	<h1>Listado de Barrios</h1>

	<a href="alta.php">
		<img src="../../imagenes/iconos/add.png" title="Agregar Barrio">
	</a>
	<br><br>
	
	<?php if($mensaje == BARRIO_GUARDADO):?>
		<h3>Barrio Guardado</h3>
		<br>
	<?php elseif($mensaje == BARRIO_MODIFICADO):?>
		<h3>Barrio Modificado</h3>
		<br>
	<?php  endif;?>

	<table border="1">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listadoBarrio as $barrio): ?>

			<tr>
				<td> <?= $barrio->getIdBarrio(); ?> </td>
				<td> <?= $barrio->getNombre(); ?> </td>
				<td>
					<a href="modificar.php?id=<?=$barrio->getIdBarrio();?>">
						<img src="../../imagenes/iconos/update.png" title="Modificar Barrio">
					</a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>
	<br>
	
</body>
</html>