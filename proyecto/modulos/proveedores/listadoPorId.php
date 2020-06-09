<?php

require_once '../../class/Proveedor.php';

$proveedor = Proveedor::obtenerPorId($_POST['numID']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Obtener Proveedor</title>
</head>
<body>

	<table border="1">
		
		<tr>
			<th>ID Usuario</th>
			<th>Razon Social</th>
			<th>Cuil</th>
			<th>ID Persona</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Sexo</th>
			<th>Numero de Documento</th>
			<th>Fecha de Nacimiento</th>
			<th>Estado</th>
		</tr>

		<tr>
			<td><?= $proveedor->getIdProveedor(); ?></td>
			<td><?= $proveedor->getRazonSocial(); ?></td>
			<td><?= $proveedor->getCuil(); ?></td>
			<td><?= $proveedor->getIdPersona(); ?></td>
			<td><?= $proveedor->getNombre(); ?></td>
			<td><?= $proveedor->getApellido(); ?></td>
			<td><?= $proveedor->getSexo(); ?></td>
			<td><?= $proveedor->getNumeroDocumento(); ?></td>
			<td><?= $proveedor->getFechaNacimiento(); ?></td>
			<td><?= $proveedor->getEstado(); ?></td>
		</tr>

	</table>

</body>
</html>