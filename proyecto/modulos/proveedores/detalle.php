<?php

require_once '../../class/Proveedor.php';

$id = $_GET['id'];

$proveedor = Proveedor::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Detalle de Proveedor</title>
</head>
<body>

	<?php require_once '../../menu.php';?>
	<h1>Detalle de Proveedor</h1>
	<table >
			<th>Nombre</th>
			<th>Numero de Documento</th>
			<th>Fecha de nacimiento</th>
			
			<th>Tipo de documento</th>
			<th>Domicilio</th>
			
			<tr>
				<td><?=$proveedor;?></td>
				
				<td><?=$proveedor->getNumeroDocumento();?></td>
			
				<td><?=$proveedor->getFechaNacimiento();?></td>
				<td><?=$proveedor->getIdTipoDocumento();?></td>
				

				<td> 
				<?php if (is_null($proveedor->domicilio)) : ?>	    

				    <a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/alta.php?idPersona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=clientes">
				        Agregar Domiclio
				    </a>

				<?php else:?>

					<?php echo $proveedor->domicilio; ?>
					<a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/modificar.php?idDomicilio=<?php echo $proveedor->domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $proveedor->getIdPersona();?>&idCliente=<?php echo $proveedor->getIdProveedor();?>">
					    Modificar Domicilio
					</a>

				<?php endif ?>
				</td>
			</tr>
		</table>	
</body>
</html>