<?php

require_once '../../class/Rubro.php';

$id = $_GET['id'];

$rubro = Rubro::obtenerPorId($id);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modificar de Rubros</title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	
	<br><br>
		<form name="frmDatos" id="frmDatos" method="POST" action="procesar/modificar.php">
			
			<input type="hidden" name="txtId" value="<?=$rubro->getIdRubro(); ?>">
		    
	        <label>Nombre:</label>
		    <input type="text" name="txtNombre" id="txtNombre" value="<?=$rubro->getNombre(); ?>" >
		    <br><br> <!-- Este es un comentario -->
	    
		   	<input type="submit" value="Actualizar" >

		</form>

</body>
</html>