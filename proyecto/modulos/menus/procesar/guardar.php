<?php

require_once "../../../class/Menu.php";

session_start();

$nombre = $_POST['txtNombre'];
$precio = $_POST['numPrecio'];
$rubro = $_POST['cboRubro'];

// VALIDACIONES
if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "El nombre del producto no debe estar vacio";
	header('Location: ../alta.php');
	exit;
} elseif (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "El nombre del producto debe contener al menos 3 caracteres";
	header('Location: ../alta.php');
	exit;
}

if (empty(trim($precio))) {
	$_SESSION['mensaje_error'] = "El precio no debe estar vacio";
	header('Location: ../alta.php');
	exit;
}

if ((int) $rubro == 0) {
	$_SESSION['mensaje_error'] = "Debe seleccionar el rubro";
	header("location: ../alta.php");
	exit;
}

//GUARDAR
$menu = new Menu($nombre, $precio);
$menu->setIdRubro($rubro);

$menu->guardar();

//REDIRECCION
header('Location: ../listado.php?mensaje=1');

?>
