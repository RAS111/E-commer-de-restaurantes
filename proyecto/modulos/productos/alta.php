<?php

require_once '../../class/Rubro.php';

$listadoRubro = Rubro::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nuevo Producto</title>
	<script src="../../static/js/productos/validaciones.js"></script>
</head>
<body>
	
	<?php require_once '../../menu.php';?>

	<h1>Registar Producto</h1>

	<?php if (isset($_SESSION['mensaje_error'])) : ?>

	    <font color="red">
	       	<?php echo $_SESSION['mensaje_error'] ?>
	    </font>

        <br><br>

    <?php
           	unset($_SESSION['mensaje_error']);
        endif;
    ?>
	
	<form name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">

	    <label>Nombre:</label>
		<input type="text" name="txtNombre" id="txtNombre">
		<br><br> <!-- Este es un comentario -->

		<label>Precio:</label>
		<input type="number" name="txtPrecio" id="txtPrecio">
		<br><br>

		<label>Stock Minimo:</label>
		<input type="number" name="txtStockMinimo" id="txtStockMinimo">
		<br><br>

		<label>Stock Actual:</label>
		<input type="number" name="txtStockActual" id="txtStockActual">
		<br><br> <!-- Salto de lineas -->

		<label>Stock Maximo:</label>
		<input type="number" name="txtStockMaximo" id="txtStockMaximo">
		<br><br> <!-- Salto de lineas -->

		<label>Rubro: </label>
		<select name="cboRubro" id="cboRubro">
			<option value="0">Seleccionar</option>
			<?php foreach ($listadoRubro as $rubro): ?>

				<option value="<?php echo $rubro->getIdRubro(); ?>">
					<?php echo $rubro; ?>
				</option>

			<?php endforeach ?>
		</select>
		<br><br> <!-- Salto de lineas -->

		<input type="button" value="Guardar" onclick="validarDatos();">			
	</form>
	<br>
	
</body>
</html>