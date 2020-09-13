<?php

require_once '../../class/Proveedor.php';

$id = $_GET['id'];

$proveedor = Proveedor::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
	<?php include_once('../../head.php'); ?>
<body>

	<?php require_once '../../menu.php';?>
	<?php require_once "../../header.php"; ?>
	<?php require_once "../../sidebar.php"; ?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-black h4">Detalle de Proveedor</h4>
					</div>
					<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">ID</th>
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
								</tr>
							</thead>
							<tbody>
								</tr>
									<td><?=$proveedor->getIdProveedor();?></td>
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
										<a class="dropdown-item" href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/modificar.php?idDomicilio=<?php echo $proveedor->domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $proveedor->getIdPersona();?>&idLlamada=<?php echo $proveedor->getIdProveedor();?> &modulo=proveedores"?><i class="dw dw-edit2"></i> Modificar</a>
										

									<?php endif ?>
									</td>
									<td>
										
										<?php foreach ($proveedor->arrContactos as $contacto) : ?>

											<?= $contacto; ?>
											<a class="dropdown-item" href="/E-commerce-de-restaurantes/proyecto/modulos/contactos/procesar/eliminar.php?id=<?php echo $contacto->getIdContacto(); ?>&idPersona=<?php echo $proveedor->getIdPersona();?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?> &modulo=proveedores"><i class="dw dw-delete-3"></i> Delete</a>
											

										<?php endforeach ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		include_once('../../file_js.php');
	?>	
</body>
</html>