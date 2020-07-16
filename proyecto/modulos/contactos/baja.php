<?php

require_once '../../class/Contacto.php';

$id = $_GET['id'];

$contacto = Contacto::obtenerPorId($id);

highlight_string($contacto, true);
exit;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Eliminar Contactos</title>
</head>
<body>

	<h1>Eliminar Contactos</h1>

	<?php require_once '../../menu.php';?>
	
	<form name="frmDatos" method="POST" action="procesar/eliminar.php">

		<input type="hidden" name="txtId" value="<?php echo $contacto->getIdContacto(); ?>">
	        <p>
	        	Contacto eliminado
	        </p>			

	</form>
	
</body>
</html>