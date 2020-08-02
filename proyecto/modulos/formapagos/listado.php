<?php

require_once '../../class/FormaPago.php';

const SIN_ACCION = 0;
const FORMAPAGO_GUARDADO = 1;
const FORMAPAGO_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoFormaPago = FormaPago::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Forma de Pago</title>
</head>
<body>

	<?php require_once '../../menu.php';?>
	<h1>Listado de Forma de Pago</h1>

	<a href="alta.php">
		<img src="../../imagenes/iconos/add.png" title="Agregar Forma de Pago">
	</a>
	<br><br>
	
	<?php if($mensaje == FORMAPAGO_GUARDADO):?>
		<h3>Forma de Pago Guardado</h3>
		<br>
	<?php elseif($mensaje == FORMAPAGO_MODIFICADO):?>
		<h3>Forma de Pago Modificado</h3>
		<br>
	<?php  endif;?>

	<table border="1">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listadoFormaPago as $formaPago): ?>

			<tr>
				<td> <?= $formaPago->getIdFormaPago(); ?> </td>
				<td> <?= $formaPago->getDescripcion(); ?> </td>
				<td>
					<a href="modificar.php?id=<?=$formaPago->getIdFormaPago();?>">
						<img src="../../imagenes/iconos/update.png" title="Modificar Forma de Pago">
					</a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>
	<br>
	
</body>
</html>