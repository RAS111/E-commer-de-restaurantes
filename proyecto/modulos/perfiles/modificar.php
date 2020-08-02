<?php

require_once '../../class/Perfil.php';

require_once "../../class/Modulo.php";

$id = $_GET['id'];

$perfil = Perfil::obtenerPorId($id);


$listadoModulos = Modulo::obtenerTodos();



?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Perfil</title>
</head>
<body>
	
	<h1>Modificar Perfil</h1>
	
	<form name="frmDatos" method="POST" action="procesar/modificar.php">

		<input type="hidden" name="txtId" value="<?=$perfil->getIdPerfil(); ?>">

	    <label>Descripcion:</label>
		<input type="text" name="txtDescripcion" value="<?=$perfil->getDescripcion(); ?>">
		<br><br> <!-- Este es un comentario -->


		<select name="cboModulos[]" multiple style="width: 155px; height: 170px;">

		    <?php foreach ($listadoModulos as $modulo) :
		    	$selected = '';
				if ($perfil->getModulos() == $modulo->getIdModulo()) {
					$selected = "SELECTED"; 
				}
		    ?>

		        <option value="<?php echo $modulo->getIdModulo(); ?>" <?php echo $selected; ?> >
		        	<?php echo $modulo ?>
		    	</option>

		    <?php endforeach ?>
			
		</select>
		<br><br>
		
		 <input type="submit" name="btnGuardar" value="Actualizar">			
	</form>
	<br>
</body>
</html>