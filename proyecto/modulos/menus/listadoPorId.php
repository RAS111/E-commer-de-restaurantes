<?php

require_once '../../class/Menu.php';

$menu = Menu::obtenerPorId($_POST['numID']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Obtener Menu</title>
</head>
<body>

	<table border="1">
		
		<tr>
			<th>ID Menu</th>
			<th>ID Item</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Rubro</th>
		</tr>

		<tr>
			<td><?= $menu->getIdMenu(); ?></td>
			<td><?= $menu->getIdItem(); ?></td>
			<td><?= $menu->getNombre(); ?></td>
			<td><?= $menu->getPrecio(); ?></td>	
			<td><?= $menu->getRubro(); ?></td>	
		</tr>

	</table>

</body>
</html>