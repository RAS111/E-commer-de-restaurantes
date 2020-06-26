<?php

require_once "../../../class/Producto.php";

$nombre = $_POST['txtNombre'];
$precio = $_POST['numPrecio'];
$stockMinimo = $_POST['numStockMinimo'];
$stockActual = $_POST['numStockActual'];
$stockMaximo = $_POST['numStockMaximo'];



if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}


$producto = new Producto($nombre, $precio);
$producto->setStockMinimo($stockMinimo);
$producto->setStockActual($stockActual);
$producto->setStockMaximo($stockMaximo);


$producto->guardar();

header('Location: ../listado.php?mensaje=1');

?>
