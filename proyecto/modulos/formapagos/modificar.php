<?php

require_once '../../class/FormaPago.php';

$id = $_GET['id'];

$formaPago = FormaPago::obtenerPorId($id);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modificar de FormaPago</title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	
	<br><br>
		<form name="frmDatos" id="frmDatos" method="POST" action="procesar/modificar.php">
			
			<input type="hidden" name="txtId" value="<?=$formaPago->getIdFormaPago(); ?>">
		    
	        <label>Descripcion:</label>
		    <input type="text" name="txtDescripcion" id="txtDescripcion" value="<?=$formaPago->getDescripcion(); ?>" >
		    <br><br> <!-- Este es un comentario -->
	    
		   	<input type="submit" value="Actualizar" >

		</form>

</body>
</html>