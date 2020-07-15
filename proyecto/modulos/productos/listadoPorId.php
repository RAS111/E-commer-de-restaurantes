<?php

require_once '../../class/Producto.php';

$producto = Producto::obtenerPorId($_POST['numID']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Obtener Productos</title>
</head>
<body>

	<table border="1">
		
		<tr>
			<th>ID Producto</th>
			<th>ID Item</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Rubro</th>
			<th>Stock</th>
		</tr>

		<tr>
			<td><?= $producto->getIdProducto(); ?></td>
			<td><?= $producto->getIdItem(); ?></td>
			<td><?= $producto->getNombre(); ?></td>
			<td><?= $producto->getPrecio(); ?></td>
			<td><?= $producto->getRubro(); ?></td>
			<td><?= $producto->getStockActual(); ?></td>
			
		</tr>

	</table>

</body>
</html>