<?php

require_once '../../class/Cliente.php';

const SIN_ACCION = 0;
const CLIENTE_GUARDADO = 1;
const CLIENTE_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoClientes = Cliente::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Clientes</title>
</head>
<body>

	<h1>Listado de Clientes</h1>
	
	<a href="alta.php">
		<img src="../../imagenes/iconos/add.png" title="Agregar cliente">
	</a>
	<br><br>

	<?php if($mensaje == CLIENTE_GUARDADO):?>
		<h3>Cliente Guardado</h3>
		<br>
	<?php elseif($mensaje == CLIENTE_MODIFICADO):?>
		<h3>Cliente Modificado</h3>
		<br>
	<?php  endif;?>
	
	<table border="1">
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Acciones</th>
		</tr>

		<?php foreach ($listadoClientes as $cliente): ?>

			<tr>
				<td> <?= $cliente->getNombre(); ?> </td>
				<td> <?= $cliente->getApellido(); ?> </td>
				<td>
					<a href="detalle.php?id=<?=$cliente->getIdCliente();?>">
						<img src="../../imagenes/iconos/view.png" title="Ver cliente">
					</a>
					-
					<a href="modificar.php?id=<?=$cliente->getIdCliente();?>">
						<img src="../../imagenes/iconos/update.png" title="Modificar cliente">	
					</a>
					-
					<a href="eliminar.php?id=<?=$cliente->getIdCliente();?>">
						<img src="../../imagenes/iconos/delete.png" title="Eliminar cliente">
					</a>
					
				</td>
			</tr>

		<?php endforeach ?>

	</table>
	<!--<?php require_once '../../menu.php';?>-->
</body>
</html>