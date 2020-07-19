
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta de Rubros</title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	
	<br><br>
		<form name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">
			
		    
	        <label>Nombre:</label>
		    <input type="text" name="txtNombre" id="txtNombre">
		    <br><br> <!-- Este es un comentario -->
	    
		   	<input type="submit" value="Guardar" >

		</form>

</body>
</html>