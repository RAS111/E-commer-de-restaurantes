<?php

require_once '../../class/Usuario.php';

$id = $_GET['id'];

$usuario = Usuario::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Detalle de Usuarios</title>
</head>
<body>

	<h1>Detalle de usuarios</h1>

	<?=$usuario;?>
	<br>
	<?=$usuario->getNumeroDocumento();?>
	<br>
	<?=$usuario->getFechaNacimiento();?>
	<br>
	<?php require_once '../../menu.php';?>
</body>
</html>