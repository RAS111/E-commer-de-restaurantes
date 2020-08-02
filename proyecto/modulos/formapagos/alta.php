<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta de FormaPagos</title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	
	<br><br>
		<form name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">
			
		    
	        <label>Descripcion:</label>
		    <input type="text" name="txtDescripcion" id="txtDescripcion">
		    <br><br> <!-- Este es un comentario -->
	    
		   	<input type="submit" value="Guardar" >

		</form>

</body>
</html>