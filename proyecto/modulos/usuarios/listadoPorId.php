<?php

require_once '../../class/Usuario.php';

$usuario = Usuario::obtenerPorId($_POST['numID']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Obtener Usuario</title>
</head>
<body>

	<table border="1">
		
		<tr>
			<th>ID Usuario</th>
			<th>Nombre de usuario</th>
			<th>ID Persona</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Sexo</th>
			<th>Numero de Documento</th>
			<th>Fecha de Nacimiento</th>
			<th>Estado</th>
		</tr>

		<tr>
			<td><?= $usuario->getIdUsuario(); ?></td>
			<td><?= $usuario->getUsername(); ?></td>
			<td><?= $usuario->getIdPersona(); ?></td>
			<td><?= $usuario->getNombre(); ?></td>
			<td><?= $usuario->getApellido(); ?></td>
			<td><?= $usuario->getSexo(); ?></td>
			<td><?= $usuario->getNumeroDocumento(); ?></td>
			<td><?= $usuario->getFechaNacimiento(); ?></td>
			<td><?= $usuario->getEstado(); ?></td>
		</tr>

	</table>

</body>
</html>