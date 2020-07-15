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
	<meta charset="utf-8">
	<title>Menu</title>
</head>
<body>
	<div class="left_area">
		<?php foreach ($usuario->perfil->getModulos() as $modulo): ?>

			<a href="/E-commerce-de-restaurantes/proyecto/modulos/<?=$modulo->getDirectorio() ?>/listado.php" class="menu">
				<?php echo $modulo; ?>
			</a>
			|

		<?php endforeach ?>
		<div class="right_area">
			<?= $usuario; ?>
			<a href="/E-commerce-de-restaurantes/proyecto/logout.php" class="logout_btn">Salir</a>
		</div>
	</div>

</body>
</html>