<?php

require_once '../../class/Domicilio.php';
require_once '../../class/Barrio.php';


$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];
$moduloLlamada = $_GET['modulo'];
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
	<!--
	<?php if (isset($_SESSION['mensaje_error'])) : ?>

	    <font color="red">
	       	<?php echo $_SESSION['mensaje_error'] ?>
	    </font>

        <br><br>

    <?php
           	unset($_SESSION['mensaje_error']);
        endif;
    ?>-->

		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="txtIdPersona" id="txtIdPersona" value="<?=$idPersona; ?>">
			<input type="hidden" name="txtIdLlamada" id="txtIdLlamada" value="<?=$idLlamada; ?>">
			<input type="hidden" name="txtModulo" id="txtModulo" value='<?php echo $moduloLlamada ?>'>
			<input type="hidden" name="txtIdDomicilio" id="txtIdDomicilio" value="<?=$domicilio->getIdDomicilio(); ?>">
			

	        <label>Calle:</label>
		    <input type="text" name="txtCalle" id="txtCalle" value="<?=$domicilio->getCalle(); ?>"> 
		    <br><br> <!-- Este es un comentario -->

		    <label>Altura:</label>
		    <input type="number" name="txtAltura" id="txtAltura" value="<?=$domicilio->getAltura(); ?>">
		    <br><br>

		   <label>Barrio: </label>
			<select name="cboBarrio" id="cboBarrio">
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
		    <input type="number" name="txtManzana" id="txtManzana" value="<?=$domicilio->getManzana(); ?>">
			<br><br> <!-- Salto de lineas -->

		    <label>Casa:</label>
		    <input type="number" name="txtCasa" id="txtCasa" value="<?=$domicilio->getCasa(); ?>">
		    <br><br>

		    <label>Piso:</label>
		    <input type="number" name="txtPiso" id="txtPiso" value="<?=$domicilio->getPiso(); ?>">
			<br><br> <!-- Salto de lineas -->

			<label>Departamento:</label>
		    <input type="number" name="txtDepartamento" id="txtDepartamento" value="<?=$domicilio->getDepartamento(); ?>">
			<br><br> <!-- Salto de lineas -->

			<label>Torre:</label>
		    <input type="number" name="txtTorre" id="txtTorre" value="<?=$domicilio->getTorre(); ?>">
			<br><br> <!-- Salto de lineas -->

			<label>Sector:</label>
		    <input type="number" name="txtSector" id="txtSector" value="<?=$domicilio->getSector(); ?>">
			<br><br> <!-- Salto de lineas -->
		    

		    <input type="submit" value="Actualizar" onclick="validarDatos();">				

		</form>

</body>
</html>