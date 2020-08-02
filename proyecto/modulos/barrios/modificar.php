<?php

require_once '../../class/Barrio.php';

$id = $_GET['id'];

$barrio = Barrio::obtenerPorId($id);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modificar de Barrios</title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	
	<br><br>
		<form name="frmDatos" id="frmDatos" method="POST" action="procesar/modificar.php">
			
			<input type="hidden" name="txtId" value="<?=$barrio->getIdBarrio(); ?>">
		    
	        <label>Nombre:</label>
		    <input type="text" name="txtNombre" id="txtNombre" value="<?=$barrio->getNombre(); ?>" >
		    <br><br> <!-- Este es un comentario -->
	    
		   	<input type="submit" value="Actualizar" >

		</form>

</body>
</html>