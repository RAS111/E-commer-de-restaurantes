<?php

require_once '../../class/Barrio.php';
$listadoBarrio = Barrio::obtenerTodos();

$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];
$moduloLlamada = $_GET['modulo'];



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta de Domicilio</title>
	<script src="../../static/js/domicilios/validaciones.js"></script>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<br>
	<br>

		<form name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">
			
		    <input type="hidden" name="txtIdPersona" id="txtIdPersona" value='<?php echo $idPersona ?>'>
		    <input type="hidden" name="txtIdLlamada" id="txtIdLlamada" value='<?php echo $idLlamada ?>'>
		    <input type="hidden" name="txtModulo" id="txtModulo" value='<?php echo $moduloLlamada ?>'>

	        <label>Calle:</label>
		    <input type="text" name="txtCalle" id="txtCalle">
		    <br><br> <!-- Este es un comentario -->

		    <label>Altura:</label>
		    <input type="number" name="txtAltura" id="txtAltura">
		    <br><br>

		    <label>Barrio: </label>
			<select name="cboBarrio" id="cboBarrio">
				<option value="0">Seleccionar</option>

				<?php foreach ($listadoBarrio as $barrio): ?>

					<option value="<?php echo $barrio->getIdBarrio(); ?>">
						<?php echo $barrio; ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br> <!-- Salto de lineas -->

		    <label>Manzana:</label>
		    <input type="number" name="txtManzana" id="txtManzana">
			<br><br> <!-- Salto de lineas -->

		    <label>Casa:</label>
		    <input type="number" name="txtCasa" id="txtCasa">
		    <br><br>

		    <label>Piso:</label>
		    <input type="number" name="txtPiso" id="txtPiso">
			<br><br> <!-- Salto de lineas -->

			<label>Departamento:</label>
		    <input type="number" name="txtDepartamento" id="txtDepartamento">
			<br><br> <!-- Salto de lineas -->

			<label>Torre:</label>
		    <input type="number" name="txtTorre" id="txtTorre">
			<br><br> <!-- Salto de lineas -->

			<label>Sector:</label>
		    <input type="number" name="txtSector" id="txtSector">
			<br><br> <!-- Salto de lineas -->
		    
		   	<input type="button" value="Guardar" onclick="validarDatos();">			

		</form>

</body>
</html>