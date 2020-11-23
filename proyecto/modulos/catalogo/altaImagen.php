<?php


$idItem = $_GET['idItem'];
$idLlamada = $_GET['idLlamada'];
$moduloLlamada = $_GET['modulo'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta de Imagen</title>
</head>
<body>

	<br><br>
	<div align="center">
		<form method="POST" action="procesar/guardar.php" enctype="multipart/form-data">
			<input type="hidden" name="txtIdItem" id="txtIdItem" value='<?php echo $idItem ?>'>
		    <input type="hidden" name="txtIdLlamada" id="txtIdLlamada" value='<?php echo $idLlamada ?>'>
		    <input type="hidden" name="txtModulo" id="txtModulo" value='<?php echo $moduloLlamada ?>'>
	        
			Imagen: <input type="file" name="fileImagen">
			
			<br><br>
			<input type="submit" value="Guardar">
		</form>
	</div>
</body>
</html>