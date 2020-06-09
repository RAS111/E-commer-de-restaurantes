<?php

require_once '../../class/Cliente.php';

$id = $_GET['id'];

$cliente = Cliente::obtenerPorId($id);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Detalle de Clientes</title>
</head>
<body>

	<h1>Detalle del Cliente</h1>
	
	<?=$cliente;?>
	<br>
	<?=$cliente->getNumeroDocumento();?>
	<br>
	<?=$cliente->getFechaNacimiento();?>
	<!--<?php require_once '../../menu.php';?>-->
</body>
</html>