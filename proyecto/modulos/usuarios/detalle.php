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
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<h4 class="text-black h4">Detalle de <?=$user->getUsername();?></h4>
					</div>
	<table border="1">
			<th>ID</th>
			<th>Nombre</th>
			<th>Numero de Documento</th>
			<th>Fecha de nacimiento</th>
			
			<th>Tipo de documento</th>
			<th>Domicilio</th>
			<th>Contacto
				<a href="/E-commerce-de-restaurantes/proyecto/modulos/contactos/alta.php?idPersona=<?php echo $user->getIdPersona(); ?>&idLlamada=<?php echo $user->getIdUsuario(); ?>&modulo=usuarios">
			        Agregar Contacto
				</a>
			</th>
			<th>imagen</th>
			
			<tr>
				<td><?=$user->getIdUsuario();?></td>
				<td><?=$user;?></td>
				
				<td><?=$user->getNumeroDocumento();?></td>
			
				<td><?=$user->getFechaNacimiento();?></td>
				<td><?=$user->getIdTipoDocumento();?></td>
				

				<td> 
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
				</td>
				<td>
					
					<?php foreach ($user->arrContactos as $contacto) : ?>

						<?= $contacto; ?>
						<a href="/E-commerce-de-restaurantes/proyecto/modulos/contactos/procesar/eliminar.php?id=<?php echo $contacto->getIdContacto(); ?>&idPersona=<?php echo $user->getIdPersona();?>&idLlamada=<?php echo $user->getIdUsuario(); ?> &modulo=usuarios">
						    Eliminar
						</a>

					<?php endforeach; ?>
				</td>
				<td>
					 <img src="../../imagenes/<?php echo $user->getImagenPerfil() ?>" width="100" height="50">
				</td>
			</tr>
		</table>	
	<?php 
		include_once('../../file_js.php');
	?>
</body>
</html>