<?php

require_once '../../class/Menu.php';

const SIN_ACCION = 0;
const MENU_GUARDADO = 1;
const MENU_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoMenus = Menu::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Menus</title>
</head>
<body>

	<h1>Listado de Menus</h1>
	
	<a href="alta.php">
		<img src="../../imagenes/iconos/add.png" title="Agregar menu">
	</a>
	<br><br>

	<?php if($mensaje == MENU_GUARDADO):?>
		<h3>Menu Guardado</h3>
		<br>
	<?php elseif($mensaje == MENU_MODIFICADO):?>
		<h3>Menu Modificado</h3>
		<br>
	<?php  endif;?>
	
	<table border="1">
		<tr>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Accion</th>

		</tr>

		<?php foreach ($listadoMenus as $menu): ?>

			<tr>
				<td> <?= $menu->getNombre(); ?> </td>
				<td> <?= $menu->getprecio(); ?> </td>
				<td>
					<a href="detalle.php?id=<?=$menu->getIdMenu();?>">
						<img src="../../imagenes/iconos/view.png" title="Ver Menu">
					</a>
					-
					<a href="modificar.php?id=<?=$menu->getIdMenu();?>">
						<img src="../../imagenes/iconos/update.png" title="Modificar Menu">	
					</a>
					
				</td>
			</tr>

		<?php endforeach ?>

	</table>
	<br>
	<?php require_once '../../menu.php';?>
</body>
</html>