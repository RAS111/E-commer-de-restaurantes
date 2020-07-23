<?php

require_once '../../class/Perfil.php';

require_once "../../class/Modulo.php";

$id = $_GET['id'];

$perfil = Perfil::obtenerPorId($id);

$listadoModulos = Modulo::obtenerModulosPorIdPerfil($id);


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

		<table border="1">
			<th>perfil</th>
			<th>modulo</th>
			

			
			<tr>
				
				<td><?=$perfil->getIdPerfil();?></td>
				<?php foreach ($listadoModulos as $modulos): ?>
					<td><?=$modulos->obtenerModulosPorIdPerfil($id) == $listadoModulos;?></td>
				<?php endforeach ?>

			 		
				

			</tr>
		</table>
	</div>
	
</body>
</html>