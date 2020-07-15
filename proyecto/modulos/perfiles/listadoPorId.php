<?php

require_once '../../class/Perfil.php';
require_once "../../class/Modulo.php";

$perfil = Perfil::obtenerPorId($_POST['numID']);


$listadoModulos = Modulo::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Obtener perfil</title>
</head>
<body>

	<table border="1">
		
		<tr>
			<th>ID Perfil</th>
			<th>Descripcion</th>
			<th>Modulo</th>
		</tr>

		<tr>
			<td><?= $perfil->getIdPerfil(); ?></td>
			<td><?= $perfil->getDescripcion(); ?></td>
			<td><?= $perfil->getModulos() == $listadoModulos; ?></td>
		</tr>

	</table>

</body>
</html>