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
	<table border="1">
			<th>Nombre</th>
			<th>Numero de Documento</th>
			<th>Fecha de nacimiento</th>
			
			<th>Tipo de documento</th>
			<th>Domicilio</th>
			<th>Contacto
				<a href="/E-commerce-de-restaurantes/proyecto/modulos/contactos/alta.php?idPersona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedores">
			        Agregar Contacto
				</a>
			</th>
			<tr>
				<td><?=$proveedor;?></td>
				
				<td><?=$proveedor->getNumeroDocumento();?></td>
			
				<td><?=$proveedor->getFechaNacimiento();?></td>
				<td><?=$proveedor->getIdTipoDocumento();?></td>
				

				<td> 
				<?php if (is_null($proveedor->domicilio)) : ?>	    

				    <a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/alta.php?idPersona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedores">
				        Agregar Domiclio
				    </a>

				<?php else:?>

					<?php echo $proveedor->domicilio; ?>
					<a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/modificar.php?idDomicilio=<?php echo $proveedor->domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $proveedor->getIdPersona();?>&idLlamada=<?php echo $proveedor->getIdProveedor();?> &modulo=proveedores">
					    Modificar Domicilio
					</a>

				<?php endif ?>
				</td>
				<td>
					
					<?php foreach ($proveedor->arrContactos as $contacto) : ?>

						<?= $contacto; ?>
						<a href="/E-commerce-de-restaurantes/proyecto/modulos/contactos/procesar/eliminar.php?id=<?php echo $contacto->getIdContacto(); ?>&idPersona=<?php echo $proveedor->getIdPersona();?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?> &modulo=proveedores">
							Eliminar
						</a>

					<?php endforeach ?>
				</td>
			</tr>
			
		</table>	
</body>
</html>