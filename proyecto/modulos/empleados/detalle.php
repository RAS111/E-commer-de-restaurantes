<?php

require_once '../../class/Empleado.php';

$id = $_GET['id'];

$empleado = Empleado::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>Detalle de Empleado</h1>

	<?= $empleado; ?>
	<br>
	<?= $empleado->getNumeroDocumento(); ?>
	<br>
	<?= $empleado->getFechaNacimiento(); ?>

	<!--<?php require_once '../../menu.php';?>-->
</body>
</html>