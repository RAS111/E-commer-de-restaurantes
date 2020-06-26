<?php

require_once '../../class/Menu.php';

$id = $_GET['id'];

$menu = Menu::obtenerPorId($id);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Detalle del Menu</title>
</head>
<body>

	<h1>Detalle del Menu</h1>
	
	<?=$menu;?>
	<br>
	
	<?php require_once '../../menu.php';?>
</body>
</html>