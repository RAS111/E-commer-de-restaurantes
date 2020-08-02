<?php

require_once '../../class/Modulo.php';

const SIN_ACCION = 0;
const MODULO_GUARDADO = 1;
const MODULO_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoModulo = Modulo::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Modulos</title>
</head>
<body>

	<?php require_once '../../menu.php';?>
	<h1>Listado de Modulos</h1>

	<a href="alta.php">
		<img src="../../imagenes/iconos/add.png" title="Agregar Modulo">
	</a>
	<br><br>
	
	<?php if($mensaje == MODULO_GUARDADO):?>
		<h3>Modulo Guardado</h3>
		<br>
	<?php elseif($mensaje == MODULO_MODIFICADO):?>
		<h3>Modulo Modificado</h3>
		<br>
	<?php  endif;?>

	<table border="1">
		<tr>
			<th>ID</th>
			<th>Descripcion</th>
			<th>Directorio</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listadoModulo as $modulo): ?>

			<tr>
				<td> <?= $modulo->getIdModulo(); ?> </td>
				<td> <?= $modulo->getDescripcion(); ?> </td>
				<td> <?= $modulo->getDirectorio(); ?></td>
				<td>
					<a href="modificar.php?id=<?=$modulo->getIdModulo();?>">
						<img src="../../imagenes/iconos/update.png" title="Modificar Modulo">
					</a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>
	<br>
	
</body>
</html>