<?php

require_once '../../class/Cliente.php';
require_once '../../class/TipoDocumento.php';

$id = $_GET['id'];

$cliente = Cliente::obtenerPorId($id);



?>

<!DOCTYPE html>
<html>
	<?php include_once('../../head.php'); ?>
<body>
	<?php require_once '../../menu.php';?>
	<?php require_once "../../header.php";?>
	<?php require_once "../../sidebar.php";?>
	<div class="main-container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
				<div class="pd-20 card-box height-100-p">
					<div class="clearfix">
						<h4 class="text-black h4">Detalle del Cliente <?=$cliente;?></h4>
					</div>
					<div class="profile-info">
						<ul>
							<li>
								<span>ID:</span>
								<?=$cliente->getIdCliente();?>
							</li>
							<li>
								<span>Numero de Documento:</span>
								<?=$cliente->getNumeroDocumento();?>
							</li>
							<li>
								<span>Fecha de nacimiento:</span>
								<?=$cliente->getFechaNacimiento();?>
							</li>
							<li>
								<span>Domicilio:</span>
								<?php if (is_null($cliente->domicilio)) : ?>	    

								    <a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/alta.php?idPersona=<?php echo $cliente->getIdPersona(); ?>&idLlamada=<?php echo $cliente->getIdCliente(); ?>&modulo=clientes">
								        Agregar Domiclio
								    </a>

								<?php else:?>

									<?= $cliente->domicilio; ?>
									<a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/modificar.php?idDomicilio=<?php echo $cliente->domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $cliente->getIdPersona();?>&idLlamada=<?php echo $cliente->getIdCLiente();?> &modulo=clientes">
									    Modificar Domicilio
									</a>

								<?php endif ?>
							</li>
							<li>
								<span>Contacto:
									<a href="/E-commerce-de-restaurantes/proyecto/modulos/contactos/alta.php?idPersona=<?php echo $cliente->getIdPersona(); ?>&idLlamada=<?php echo $cliente->getIdCliente(); ?>&modulo=clientes">
								        Agregar Contacto
									</a>
								</span>
									<?php foreach ($cliente->arrContactos as $contacto) : ?>

										<?= $contacto; ?>
										<a href="/E-commerce-de-restaurantes/proyecto/modulos/contactos/procesar/eliminar.php?id=<?php echo $contacto->getIdContacto(); ?>&idPersona=<?php echo $cliente->getIdPersona();?>&idLlamada=<?php echo $cliente->getIdCLiente(); ?> &modulo=clientes">
										    Eliminar
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