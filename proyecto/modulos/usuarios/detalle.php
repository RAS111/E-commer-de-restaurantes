<?php

require_once '../../class/Usuario.php';

$id = $_GET['id'];

$user = Usuario::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Detalle de Usuarios</title>
</head>
<body>
	<?php require_once '../../menu.php';?>
	<h1>Detalle de usuarios</h1>
	<table border="1">
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
			<tr>
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

					<?php endforeach ?>
				</td>
			</tr>
		</table>	
</body>
</html>