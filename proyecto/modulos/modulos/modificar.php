<?php

require_once '../../class/Modulo.php';

$id = $_GET['id'];

$modulo = Modulo::obtenerPorId($id);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modificar de Perfiles</title>
</head>
<body>

	<h1>Modificar de Perfiles</h1>
	<form name="frmDatos" method="POST" action="procesar/Modificar.php">

		<input type="hidden" name="txtId" value="<?=$modulo->getIdModulo(); ?>">

	   	<label>Descricpcion:</label>
		<input type="text" name="txtDescripcion" value="<?=$modulo->getDescripcion(); ?>">
		<br><br> <!-- Este es un comentario -->

		<label>Directorio:</label>
		<input type="text" name="txtDirectorio" value="<?=$modulo->getDirectorio(); ?>">
		<br><br> <!-- Este es un comentario -->

	    <input type="submit" name="btnGuardar" value="Actualizar">			

	</form>

</body>
</html>