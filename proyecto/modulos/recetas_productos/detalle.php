<?php

require_once '../../class/RecetaProducto.php';

$id = $_GET['id'];

$recetaProducto = RecetaProducto::obtenerPorId($id);



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detalle de la Receta Producto</title>
	<!--<link rel="stylesheet" type="text/css" href="../../static/css/style3.css">-->
</head>
<body>
	<header>
	<?php require_once '../../menu.php';?>
	</header>
	<br>

	<div class="contenedor">
		<h1>Detalle de la Receta Producto</h1>

		<table border="1">
			<th>ID</th>
			<th>Receta</th>
			<th>Cantidad</th>
			<th>Productos</th>

			<tr>
				
				<td><?=$recetaProducto->getIdRecetaProducto();?></td>
				<td><?=$recetaProducto->getIdReceta();?></td>
				<td><?=$recetaProducto->getCantidad();?></td>
				<td><?=$recetaProducto->getIdProducto();?></td>
			</tr>
		</table>
	</div>
	
</body>
</html>