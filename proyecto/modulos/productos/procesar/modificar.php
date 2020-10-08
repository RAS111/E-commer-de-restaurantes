<?php

require_once "../../../class/Producto.php";

session_start();

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$precio = $_POST['numPrecio'];
$stockActual = $_POST['numStockActual'];
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

if (empty(trim($stockActual))) {
	$_SESSION['mensaje_error'] = "La cantidad de stock actual no debe estar vacia";
	header("Location: ../modificar.php?id=$id");
	exit;
}


if ((int) $rubro == 0) {
	$_SESSION['mensaje_error'] = "debe seleccionar el rubro";
	header("Location: ../modificar.php?id=$id");
	exit;
}

//ACTUALIZAR
$producto = Producto::obtenerPorId($id);
$producto->setNombre($nombre);
$producto->setPrecio($precio);
$producto->setStockActual($stockActual);
$producto->setIdRubro($rubro);

$producto->actualizar();

//REDIRECCION
header('Location: ../listado.php?mensaje=2');

?>
