<?php

require_once '../../class/Producto.php';

const SIN_ACCION = 0;
const PRODUCTO_GUARDADO = 1;
const PRODUCTO_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoProductos = Producto::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado Productos</title>
</head>
<body>
	<?php require_once '../../menu.php';?>

	<h1>Listado de Productos</h1>
	
	<a href="alta.php">
		<img src="../../imagenes/iconos/add.png" title="Agregar productos">
	</a>
	<br><br>

	<?php if($mensaje == PRODUCTO_GUARDADO):?>
		<h3>Producto Guardado</h3>
		<br>
	<?php elseif($mensaje == PRODUCTO_MODIFICADO):?>
		<h3>Producto Modificado</h3>
		<br>
	<?php  endif;?>
	
	<table border="1">
		<tr>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listadoProductos as $producto): ?>

			<tr>
				<td> <?= $producto->getNombre(); ?> </td>
				<td> <?= $producto->getPrecio(); ?> </td>	
				<td>
					<a href="detalle.php?id=<?=$producto->getIdProducto();?>">
						<img src="../../imagenes/iconos/view.png" title="Ver producto">
					</a>
					-
					<a href="modificar.php?id=<?=$producto->getIdProducto();?>">
						<img src="../../imagenes/iconos/update.png" title="Modificar producto">	
					</a>
					
				</td>
			</tr>

		<?php endforeach ?>

	</table>
	<br>
	
</body>
</html>