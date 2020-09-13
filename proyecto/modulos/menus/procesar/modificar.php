<?php

require_once "../../../class/Menu.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$precio = $_POST['numPrecio'];
$rubro = $_POST['cboRubro'];




if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}



$menu = Menu::obtenerPorId($id);
$menu->setNombre($nombre);
$menu->setPrecio($precio);
$menu->setIdRubro($rubro);
$menu->actualizar();


header('Location: ../listado.php?mensaje=2');

?>
