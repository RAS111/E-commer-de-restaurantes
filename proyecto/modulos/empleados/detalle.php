<?php

require_once '../../class/Empleado.php';

$id = $_GET['id'];

$empleado = Empleado::obtenerPorId($id);

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
						<h4 class="text-black h4">Detalle de Empleado <?=$empleado;?></h4>
					</div>
					<div class="profile-info">
						<ul>
							<li>
								<span>ID:</span>
								<?=$empleado->getIdEmpleado();?>
							</li>
							<li>
								<span>Numero de Documento:</span>
								<?=$empleado->getNumeroDocumento();?>
							</li>
							<li>
								<span>Fecha de nacimiento:</span>
								<?=$empleado->getFechaNacimiento();?>
							</li>
							<li>
								<span>Domicilio:</span>
								<?php if (is_null($empleado->domicilio)) : ?>	    

								    <a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/alta.php?idPersona=<?php echo $empleado->getIdPersona(); ?>&idLlamada=<?php echo $empleado->getIdEmpleado(); ?>&modulo=empleados">
								        Agregar Domiclio
								    </a>

								<?php else:?>

									<?php echo $empleado->domicilio; ?>
									<a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/modificar.php?idDomicilio=<?php echo $empleado->domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $empleado->getIdPersona();?>&idLlamada=<?php echo $empleado->getIdEmpleado();?> &modulo=empleados ">
									    Modificar Domicilio
									</a>

								<?php endif ?>
							</li>
							<li>
								<span>Contacto: 
									<a href="/E-commerce-de-restaurantes/proyecto/modulos/contactos/alta.php?idPersona=<?php echo $empleado->getIdPersona(); ?>&idLlamada=<?php echo $empleado->getIdEmpleado(); ?>&modulo=empleados">
										Agregar Contacto
									</a>
								</span>
								<?php foreach ($empleado->arrContactos as $contacto) : ?>

									<?= $contacto; ?>
									<a href="/E-commerce-de-restaurantes/proyecto/modulos/contactos/procesar/eliminar.php?id=<?php echo $contacto->getIdContacto(); ?>&idPersona=<?php echo $empleado->getIdPersona();?>&idLlamada=<?php echo $empleado->getIdEmpleado(); ?> &modulo=empleados">
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