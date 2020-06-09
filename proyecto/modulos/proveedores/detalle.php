<?php

require_once '../../class/Proveedor.php';

$id = $_GET['id'];

$usuario = Proveedor::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Detalle de Proveedor</title>
</head>
<body>

	<h1>Detalle de Proveedor</h1>

	<?= $proveedor; ?>
	<br>
	<?= $proveedor->getNumeroDocumento(); ?>
	<br>
	<?= $proveedor->getFechaNacimiento(); ?>
	<br>
	<!--<?php require_once '../../menu.php';?>-->
</body>
</html>