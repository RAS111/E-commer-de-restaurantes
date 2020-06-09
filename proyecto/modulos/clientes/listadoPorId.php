<?php

require_once '../../class/Cliente.php';

$cliente = Cliente::obtenerPorId($_POST['numID']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Obtener Clientes</title>
</head>
<body>

	<table border="1">
		
		<tr>
			<th>ID Cliente</th>
			<th>ID Persona</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Sexo</th>
			<th>Numero de Documento</th>
			<th>Fecha de Nacimiento</th>
			<th>Estado</th>
		</tr>

		<tr>
			<td><?= $cliente->getIdCliente(); ?></td>
			<td><?= $cliente->getIdPersona(); ?></td>
			<td><?= $cliente->getNombre(); ?></td>
			<td><?= $cliente->getApellido(); ?></td>
			<td><?= $cliente->getSexo(); ?></td>
			<td><?= $cliente->getNumeroDocumento(); ?></td>
			<td><?= $cliente->getFechaNacimiento(); ?></td>
			<td><?= $cliente->getEstado(); ?></td>
		</tr>

	</table>

</body>
</html>