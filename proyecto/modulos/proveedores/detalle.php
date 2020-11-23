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
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
				<div class="pd-20 card-box height-100-p">
					<div class="clearfix">
						<h4 class="text-black h4">Detalle de Proveedor <?=$proveedor;?></h4>
					</div>
					<div class="profile-info">
						<ul>
							<li>
								<span>ID:</span>
								<?=$proveedor->getIdProveedor();?>
							</li>
							<li>
								<span>Numero de Documento:</span>
								<?=$proveedor->getNumeroDocumento();?>
							</li>
							<li>
								<span>Fecha de nacimiento:</span>
								<?=$proveedor->getFechaNacimiento();?>
							</li>
							<li>
								<span>Domicilio:</span>
								<?php if (is_null($proveedor->domicilio)) : ?>	    

										<a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/alta.php?idPersona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedores">
											Agregar Domiclio
										</a>

									<?php else:?>

										<?php echo $proveedor->domicilio; ?>
										<a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/modificar.php?idDomicilio=<?php echo $proveedor->domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $proveedor->getIdPersona();?>&idLlamada=<?php echo $proveedor->getIdProveedor();?> &modulo=proveedores"?>
											Modificar
										</a>
										

									<?php endif; ?>
							</li>
							<li>
								<span>Contacto:
									<a href="/E-commerce-de-restaurantes/proyecto/modulos/contactos/alta.php?idPersona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedores">
										Agregar Contacto
									</a>
								</span>
								<?php foreach ($proveedor->arrContactos as $contacto) : ?>

									<?= $contacto; ?>
									<a href="/E-commerce-de-restaurantes/proyecto/modulos/contactos/procesar/eliminar.php?id=<?php echo $contacto->getIdContacto(); ?>&idPersona=<?php echo $proveedor->getIdPersona();?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?> &modulo=proveedores"> 	Eliminar
									</a>
									

								<?php endforeach ?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>								
	<?php include_once('../../file_js.php');?>
</body>
</html>