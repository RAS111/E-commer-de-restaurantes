<?php

require_once '../../class/Domicilio.php';
require_once '../../class/Barrio.php';


$idPersona = $_GET['idPersona'];
$idCliente = $_GET['idCliente'];
$domicilio = Domicilio::obtenerPorIdPersona($idPersona);

$listadoBarrio = Barrio::obtenerTodos();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta de Domicilio</title>
	<!--<script src="../../static/js/domicilios/validaciones.js"></script>-->
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<br>
	<br>

		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="txtIdPersona" value="<?=$idPersona; ?>">
			<input type="hidden" name="txtIdCliente" value="<?=$idCliente; ?>">
			<input type="hidden" name="txtIdDomicilio" value="<?=$domicilio; ?>">
			

	        <label>Calle:</label>
		    <input type="text" name="txtCalle" value="<?=$domicilio->getCalle(); ?>"> 
		    <br><br> <!-- Este es un comentario -->

		    <label>Altura:</label>
		    <input type="number" name="txtAltura" value="<?=$domicilio->getAltura(); ?>">
		    <br><br>

		   <label>Barrio: </label>
			<select name="cboBarrio">
				<option value="0">Seleccionar</option>

				<?php
				foreach ($listadoBarrio as $barrio):
					$selected = '';
					if ($domicilio->getIdBarrio() == $barrio->getIdBarrio()) {
						$selected = "SELECTED";
					}
				?>

					<option value="<?php echo $barrio->getIdBarrio(); ?>" <?php echo $selected; ?>>
						<?php echo $barrio; ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br> <!-- Salto de lineas -->

		    <label>Manzana:</label>
		    <input type="number" name="txtManzana" value="<?=$domicilio->getManzana(); ?>">
			<br><br> <!-- Salto de lineas -->

		    <label>Casa:</label>
		    <input type="number" name="txtCasa" value="<?=$domicilio->getCasa(); ?>">
		    <br><br>

		    <label>Piso:</label>
		    <input type="number" name="txtPiso" value="<?=$domicilio->getPiso(); ?>">
			<br><br> <!-- Salto de lineas -->

			<label>Departamento:</label>
		    <input type="number" name="txtDepartamento" value="<?=$domicilio->getDepartamento(); ?>">
			<br><br> <!-- Salto de lineas -->

			<label>Torre:</label>
		    <input type="number" name="txtTorre" value="<?=$domicilio->getTorre(); ?>">
			<br><br> <!-- Salto de lineas -->

			<label>Sector:</label>
		    <input type="number" name="txtSector" value="<?=$domicilio->getSector(); ?>">
			<br><br> <!-- Salto de lineas -->
		    

		    <input type="submit" value="Actualizar" onclick="validarDatos();">				

		</form>

</body>
</html>