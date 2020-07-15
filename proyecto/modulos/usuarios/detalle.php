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
	<table >
			<th>Nombre</th>
			<th>Numero de Documento</th>
			<th>Fecha de nacimiento</th>
			
			<th>Tipo de documento</th>
			<th>Domicilio</th>
			
			<tr>
				<td><?=$user;?></td>
				
				<td><?=$user->getNumeroDocumento();?></td>
			
				<td><?=$user->getFechaNacimiento();?></td>
				<td><?=$user->getIdTipoDocumento();?></td>
				

				<td> 
				<?php if (is_null($usuario->domicilio)) : ?>	    

				    <a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/alta.php?idPersona=<?php echo $usuario->getIdPersona(); ?>&idLlamada=<?php echo $usuario->getIdUsuario(); ?>&modulo=usuarios">
				        Agregar Domiclio
				    </a>

				<?php else:?>

					<?php echo $usuario->domicilio; ?>
					<a href="/E-commerce-de-restaurantes/proyecto/modulos/domicilios/modificar.php?idDomicilio=<?php echo $usuario->domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $usuario->getIdPersona();?>&idUsuario=<?php echo $usuario->getIdUsuario();?>">
					    Modificar Domicilio
					</a>

				<?php endif ?>
				</td>
			</tr>
		</table>	
</body>
</html>