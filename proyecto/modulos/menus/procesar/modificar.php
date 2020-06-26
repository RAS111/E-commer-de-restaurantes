<?php

require_once "../../../class/Menu.php";

$nombre = $_POST['txtNombre'];
$precio = $_POST['numPrecio'];




if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}



$menu = Menu::obtenerPorId();
$menu->setNombre($nombre);
$menu->setPrecio($precio);



$menu->actualizar();

header('Location: ../listado.php?mensaje=2');

?>
