<?php

require_once '../../class/Cliente.php';
require_once '../../class/TipoDocumento.php';

$id = $_GET['id'];

$cliente = Cliente::obtenerPorId($id);



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detalle de Clientes</title>
	<!--<link rel="stylesheet" type="text/css" href="../../static/css/style3.css">-->
</head>
<body>
	<header>
	<?php require_once '../../menu.php';?>
	</header>
	<br>

	<div class="contenedor">
		<h1>Detalle del Cliente</h1>

		<table >
			<th>Nombre</th>
			<th>Numero de Documento</th>
			<th>Fecha de nacimiento</th>
			
			<th>Tipo de documento</th>
			<th>Domicilio</th>
			
			<tr>
				<td><?=$cliente;?></td>
				
				<td><?=$cliente->getNumeroDocumento();?></td>
			
				<td><?=$cliente->getFechaNacimiento();?></td>
				<td><?=$cliente->getIdTipoDocumento();?></td>
				

				<td> 
				<?php if (is_null($cliente->domicilio)) : ?>	    

				    <a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/alta.php?idPersona=<?php echo $cliente->getIdPersona(); ?>&idLlamada=<?php echo $cliente->getIdCliente(); ?>&modulo=clientes">
				        Agregar Domiclio
				    </a>

				<?php else:?>

					<?php echo $cliente->domicilio; ?>
					<a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/modificar.php?idDomicilio=<?php echo $cliente->domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $cliente->getIdPersona();?>&idCliente=<?php echo $cliente->getIdCLiente();?>">
					    Modificar Domicilio
					</a>

				<?php endif ?>
				</td>
			</tr>
		</table>
	</div>
	
</body>
</html>