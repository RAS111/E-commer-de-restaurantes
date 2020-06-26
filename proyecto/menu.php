<?php

require_once "class/Usuario.php";

session_start();

if (!isset($_SESSION['usuario'])) {
	header('location: formulario_login.php');
}

$usuario = $_SESSION['usuario'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php foreach ($usuario->perfil->getModulos() as $modulo): ?>

		<a href="/E-commerce-de-restaurantes/proyecto/modulos/<?=$modulo->getDirectorio() ?>/listado.php">
			<?php echo $modulo; ?>
		</a>
		|

	<?php endforeach ?>
	<br><br>
	<?= $usuario; ?>
	|
	<a href="/E-commerce-de-restaurantes/proyecto/logout.php">Salir</a>
 

</body>
</html>