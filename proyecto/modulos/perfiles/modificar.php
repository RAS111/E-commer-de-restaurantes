<?php

require_once "../../class/Modulo.php";
require_once "../../class/Perfil.php";


$idPerfil = $_GET['id'];

$perfil = Perfil::obtenerPorId($idPerfil);
$listadoModulos = Modulo::obtenerTodos();


//highlight_string(var_export($perfil, true));
//exit;

?>


<!DOCTYPE html>
<html>
<head>
	<title>Modificacion de Perfil</title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<br>
	<br>

	<h4>Modificacion de Perfil</h4>
	<br>

		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="txtIdPerfil" value="<?php echo $idPerfil; ?>">

	        <label>Descripcion:</label>
		    <input type="text" name="txtDescripcion" value="<?php echo $perfil->getDescripcion(); ?>">
		    <br><br>

		    <select name="cboModulos[]" multiple style="width: 250px; height: 250px;">

		         <?php foreach ($listadoModulos as $modulo) :?>

		         	<?php

		         	$selected = '';
		         	$idModulo = $modulo->getIdModulo();

		         	if ($perfil->tieneModulo($idModulo)) {
		         		$selected = "SELECTED";
		         	}

		         	?>

		         	<option value="<?php echo $modulo->getIdModulo(); ?>" <?php echo $selected ?> >
		         		<?php echo $modulo ?>
		         	</option>

		         <?php endforeach ?>

		    </select>
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Actualizar">			

		</form>

</body>
</html>