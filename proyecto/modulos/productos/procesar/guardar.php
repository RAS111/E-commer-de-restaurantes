<?php

require_once "../../../class/Producto.php";

session_start();

$nombre = $_POST['txtNombre'];
$precio = $_POST['txtPrecio'];
$stockMinimo = $_POST['txtStockMinimo'];
$stockActual = $_POST['txtStockActual'];
$stockMaximo = $_POST['txtStockMaximo'];
$rubro = $_POST['cboRubro'];

// VALIDACIONES

if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "el nombre del producto no debe estar vacio";
	header('Location: ../alta.php');
	exit;
} elseif (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "el nombre del producto debe contener al menos 3 caracteres";
	header('Location: ../alta.php');
	exit;
}

if (empty(trim($precio))) {
	$_SESSION['mensaje_error'] = "el precio no debe estar vacio";
	header('Location: ../alta.php');
	exit;
}

if (empty(trim($stockMinimo))) {
	$_SESSION['mensaje_error'] = "la cantidad de stock minima no debe estar vacia";
	header('Location: ../alta.php');
	exit;
}

if (empty(trim($stockActual))) {
	$_SESSION['mensaje_error'] = "la cantidad de stock actual no debe estar vacia";
	header('Location: ../alta.php');
	exit;
}

if (empty(trim($stockMaximo))) {
	$_SESSION['mensaje_error'] = "la cantidad de stock maxima no debe estar vacia";
	header('Location: ../alta.php');
	exit;
}

if ((int) $rubro == 0) {
	$_SESSION['mensaje_error'] = "debe seleccionar el rubro";
	header("location: ../alta.php");
	exit;
}

// GUARDAR PRODUCTO

$producto = new Producto($nombre, $precio);
$producto->setStockMinimo($stockMinimo);
$producto->setStockActual($stockActual);
$producto->setStockMaximo($stockMaximo);
$producto->setIdRubro($rubro);

$producto->guardar();

// REDIRECCION

header('Location: ../listado.php?mensaje=1');

?>
