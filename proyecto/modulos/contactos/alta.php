<?php

require_once '../../class/TipoContacto.php';

$listadoTipoContacto = TipoContacto::obtenerTodos();


$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];
$moduloLlamada = $_GET['modulo'];



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta de Contactos</title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<br><br>
		<form name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">
			
		    <input type="hidden" name="txtIdPersona" id="txtIdPersona" value='<?php echo $idPersona ?>'>
		    <input type="hidden" name="txtIdLlamada" id="txtIdLlamada" value='<?php echo $idLlamada ?>'>
		    <input type="hidden" name="txtModulo" id="txtModulo" value='<?php echo $moduloLlamada ?>'>

	        <label>Valor:</label>
		    <input type="text" name="txtValor" id="txtValor">
		    <br><br> <!-- Este es un comentario -->


		    <label>Tipo Contacto: </label>
			<select name="cboTipoContacto" id="cboTipoContacto">
				<option value="0">Seleccionar</option>

				<?php foreach ($listadoTipoContacto as $tipoContacto): ?>

					<option value="<?php echo $tipoContacto->getIdTipoContacto(); ?>">
						<?= $tipoContacto?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br> <!-- Salto de lineas -->

		    
		   	<input type="submit" value="Guardar" >

		</form>

</body>
</html>