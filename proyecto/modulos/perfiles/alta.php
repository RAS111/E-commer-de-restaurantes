<?php

require_once "../../class/Modulo.php";

$listadoModulos = Modulo::obtenerTodos();

?>

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

		<select name="cboModulos[]" multiple style="width: 155px; height: 170px;">

		    <?php foreach ($listadoModulos as $modulo) :?>

		        <option value="<?php echo $modulo->getIdModulo(); ?>">
		        	<?php echo $modulo ?>
		    	</option>

		    <?php endforeach ?>

		</select>
		<br><br>

	    <input type="submit" name="btnGuardar" value="Guardar">			

	</form>

</body>
</html>