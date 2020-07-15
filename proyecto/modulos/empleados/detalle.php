<?php

require_once '../../class/Empleado.php';

$id = $_GET['id'];

$empleado = Empleado::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detalle del empleado</title>
</head>
<body>

	<?php require_once '../../menu.php';?>
	<h1>Detalle del Empleado</h1>> 
	
	<table >
			<th>Nombre</th>
			<th>Numero de Documento</th>
			<th>Fecha de nacimiento</th>
			
			<th>Tipo de documento</th>
			<th>Domicilio</th>
			
			<tr>
				<td><?=$empleado;?></td>
				
				<td><?=$empleado->getNumeroDocumento();?></td>
			
				<td><?=$empleado->getFechaNacimiento();?></td>
				<td><?=$empleado->getIdTipoDocumento();?></td>
				

				<td> 
				<?php if (is_null($empleado->domicilio)) : ?>	    

				    <a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/alta.php?idPersona=<?php echo $empleado->getIdPersona(); ?>&idLlamada=<?php echo $empleado->getIdEmpleado(); ?>&modulo=clientes">
				        Agregar Domiclio
				    </a>

				<?php else:?>

					<?php echo $empleado->domicilio; ?>
					<a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/modificar.php?idDomicilio=<?php echo $empleado->domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $empleado->getIdPersona();?>&idEmpleado=<?php echo $empleado->getIdEmpleado();?>">
					    Modificar Domicilio
					</a>

				<?php endif ?>
				</td>
			</tr>
		</table>
	
</body>
</html>