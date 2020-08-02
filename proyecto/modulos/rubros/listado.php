<?php

require_once '../../class/Rubro.php';

const SIN_ACCION = 0;
const RUBRO_GUARDADO = 1;
const RUBRO_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoRubro = Rubro::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Rubro</title>
</head>
<body>

	<?php require_once '../../menu.php';?>
	<h1>Listado de Rubro</h1>

	<a href="alta.php">
		<img src="../../imagenes/iconos/add.png" title="Agregar Rubro">
	</a>
	<br><br>
	
	<?php if($mensaje == RUBRO_GUARDADO):?>
		<h3>Rubro Guardado</h3>
		<br>
	<?php elseif($mensaje == RUBRO_MODIFICADO):?>
		<h3>Rubro Modificado</h3>
		<br>
	<?php  endif;?>

	<table border="1">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listadoRubro as $rubro): ?>

			<tr>
				<td> <?= $rubro->getIdRubro(); ?> </td>
				<td> <?= $rubro->getNombre(); ?> </td>
				<td>
					<a href="modificar.php?id=<?=$rubro->getIdRubro();?>">
						<img src="../../imagenes/iconos/update.png" title="Modificar Rubro">
					</a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>
	<br>
	
</body>
</html>