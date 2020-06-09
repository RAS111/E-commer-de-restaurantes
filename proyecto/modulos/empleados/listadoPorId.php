<?php

require_once '../../class/Empleado.php';

$empleado = Empleado::obtenerPorId($_POST['numID']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Obtener Empleado</title>
</head>
<body>

	<table border="1">
		
		<tr>
			<th>ID Empleado</th>
			<th>ID Persona</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Sexo</th>
			<th>Numero de Documento</th>
			<th>Fecha de Nacimiento</th>
			<th>Estado</th>
		</tr>

		<tr>
			<td><?= $empleado->getIdEmpleado(); ?></td>
			<td><?= $empleado->getIdPersona(); ?></td>
			<td><?= $empleado->getNombre(); ?></td>
			<td><?= $empleado->getApellido(); ?></td>
			<td><?= $empleado->getSexo(); ?></td>
			<td><?= $empleado->getNumeroDocumento(); ?></td>
			<td><?= $empleado->getFechaNacimiento(); ?></td>
			<td><?= $empleado->getNumeroLegajo();?></td>
			<td><?= $empleado->getEstado();?></td>
		</tr>

	</table>

</body>
</html>