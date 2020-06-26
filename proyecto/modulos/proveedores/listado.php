<?php

require_once '../../class/Proveedor.php';

const SIN_ACCION = 0;
const PROVEEDOR_GUARDADO = 1;
const PROVEEDOR_MODIFICADO = 2;

if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}


$listadoProveedor = Proveedor::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Proveedor</title>
</head>
<body>

	<h1>Listado de Proveedores</h1>
	
	<a href="alta.php">
		<img src="../../imagenes/iconos/add.png" title="Agregar Proveedor">
	</a>
	<br><br>

	<?php if($mensaje == PROVEEDOR_GUARDADO):?>
		<h3>Proveedor Guardado</h3>
		<br>
	<?php elseif($mensaje == PROVEEDOR_MODIFICADO):?>
		<h3>Proveedor Modificado</h3>
		<br>
	<?php  endif;?>

	<table border="1">
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Razon Social</th>
			<th>Acciones</th>
		</tr>

		<?php foreach ($listadoProveedor as $proveedor): ?>

			<tr>
				<td> <?= $proveedor->getNombre(); ?> </td>
				<td> <?= $proveedor->getApellido(); ?> </td>
				<td> <?= $proveedor->getRazonSocial(); ?> </td>
				
				<td>
					<a href="detalle.php?id=<?=$proveedor->getIdProveedor();?>">
						<img src="../../imagenes/iconos/view.png" title="Ver Proveedor">
					</a>
					-
					<a href="modificar.php?id=<?=$proveedor->getIdProveedor();?>">
						<img src="../../imagenes/iconos/update.png" title="Modificar Proveedor">
					</a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>
	<br>
	<?php require_once '../../menu.php';?>
</body>
</html>