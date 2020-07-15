<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta de Perfiles</title>
</head>
<body>

	<h1>Alta de Perfiles</h1>
	<form name="frmDatos" method="POST" action="procesar/guardar.php">

	   	<label>Descricpcion:</label>
		<input type="text" name="txtDescripcion">
		<br><br> <!-- Este es un comentario -->

		<label>Directorio:</label>
		<input type="text" name="txtDirectorio">
		<br><br> <!-- Este es un comentario -->

	    <input type="submit" name="btnGuardar" value="Guardar">			

	</form>

</body>
</html>