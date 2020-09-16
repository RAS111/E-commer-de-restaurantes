<?php

require_once '../../class/Usuario.php';

$id = $_GET['id'];

$user = Usuario::obtenerPorId($id);

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
					<div class="profile-photo" x>
						<img src="../../imagenes/<?php echo $user->getImagenPerfil() ?>" class="avatar-photo">	
					</div>
					<h5 class="text-center h5 mb-0">Detalle de <?=$user->getUsername();?></h5>
					<div class="profile-info">
						<ul>
							<li>
								<span>ID:</span>
								<?=$user->getIdUsuario();?>
							</li>
							<li>
								<span>Nombre:</span>
                                <?=$user;?>
							</li>
							<li>
								<span>Numero de Documento:</span>
								<?=$user->getNumeroDocumento();?>
							</li>
							<li>
								<span>Fecha de nacimiento:</span>
								<?=$user->getFechaNacimiento();?>
							</li>
							<li>
								<span>Domicilio</span>
								<?php if (is_null($user->domicilio)) : ?>	    

									<a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/alta.php?idPersona=<?php echo $user->getIdPersona(); ?>&idLlamada=<?php echo $user->getIdUsuario(); ?>&modulo=usuarios">
										Agregar Domiclio
									</a>

								<?php else:?>

									<?php echo $user->domicilio; ?>
									<a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/modificar.php?idDomicilio=<?php echo $user->domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $user->getIdPersona();?>&idLlamada=<?php echo $user->getIdUsuario();?> &modulo=usuarios">
										Modificar Domicilio
									</a>

								<?php endif ?>
							</li>
							<li>
								<span>Contacto 
									<a href="/E-commerce-de-restaurantes/proyecto/modulos/contactos/alta.php?idPersona=<?php echo $user->getIdPersona(); ?>&idLlamada=<?php echo $user->getIdUsuario(); ?>&modulo=usuarios">
										Agregar Contacto
									</a>
								</span>
								<?php foreach ($user->arrContactos as $contacto) : ?>

									<?= $contacto; ?>
									<a href="/E-commerce-de-restaurantes/proyecto/modulos/contactos/procesar/eliminar.php?id=<?php echo $contacto->getIdContacto(); ?>&idPersona=<?php echo $user->getIdPersona();?>&idLlamada=<?php echo $user->getIdUsuario(); ?> &modulo=usuarios">
										Eliminar
									</a>

								<?php endforeach; ?>
							</li>
						</ul>
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