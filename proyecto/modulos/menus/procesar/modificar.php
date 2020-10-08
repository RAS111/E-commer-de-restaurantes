<?php

require_once "../../../class/Menu.php";

session_start();

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$precio = $_POST['numPrecio'];
$rubro = $_POST['cboRubro'];

// VALIDACIONES
if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "El nombre del producto no debe estar vacio";
	header("Location: ../modificar.php?id=$id");
	exit;
} elseif (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "El nombre del producto debe contener al menos 3 caracteres";
	header("Location: ../modificar.php?id=$id");
	exit;
}

if (empty(trim($precio))) {
	$_SESSION['mensaje_error'] = "El precio no debe estar vacio";
	header("Location: ../modificar.php?id=$id");
	exit;
}

if ((int) $rubro == 0) {
	$_SESSION['mensaje_error'] = "Debe seleccionar el rubro";
	header("Location: ../modificar.php?id=$id");
	exit;
}

//MODIFICAR
$menu = Menu::obtenerPorId($id);
$menu->setNombre($nombre);
$menu->setPrecio($precio);
$menu->setIdRubro($rubro);
$menu->actualizar();

//REDIRECCION
header('Location: ../listado.php?mensaje=2');

?>
