<?php

require_once "../../../class/Menu.php";

$nombre = $_POST['txtNombre'];
$precio = $_POST['numPrecio'];




if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}


$menu = new Menu($nombre, $precio);

$menu->guardar();

header('Location: ../listado.php?mensaje=1');

?>
