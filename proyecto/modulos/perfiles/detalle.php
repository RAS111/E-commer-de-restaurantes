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
			<th>Perfil</th>
			<th>Modulos</th>
			

			
			<tr>
				
				<td><?=$perfil->getIdPerfil();?></td>
				<td>
					<?php foreach ($listadoModulos as $modulo): ?>
						<?php 

				 		$idModulo = $modulo->getIdModulo();

			         	if ($perfil->tieneModulo($idModulo)) {
			         		echo "$modulo -";
			         	} 

			         	?>
					<?php endforeach ?>
				</td>
			 	
				

			</tr>
		</table>
	</div>
	
</body>
</html>