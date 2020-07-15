<?php

require_once '../../class/Perfil.php';

require_once "../../class/Modulo.php";

$id = $_GET['id'];

$perfil = Perfil::obtenerPorId($id);

$listadoModulos = Modulo::obtenerTodos();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detalle de Perfil</title>
	<!--<link rel="stylesheet" type="text/css" href="../../static/css/style3.css">-->
</head>
<body>
	<header>
	<?php require_once '../../menu.php';?>
	</header>
	<br>

	<div class="contenedor">
		<h1>Detalle del Perfil</h1>

		<table >
			<th>perfil</th>
			<th>modulo</th>
			

			
			<tr>
				
				<td><?=$perfil->getIdPerfil();?></td>
				<td><?=$perfil->getModulos() == $listadoModulos?></td>
			 		
				

			</tr>
		</table>
	</div>
	
</body>
</html>