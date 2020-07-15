<?php

require_once "../../../class/Producto.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$precio = $_POST['numPrecio'];
$stockActual = $_POST['numStockActual'];
$rubro = $_POST['cboRubro'];

if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}



//$producto = new Producto($nombre, $precio);
$producto = Producto::obtenerPorId($id);
$producto->setNombre($nombre);
$producto->setPrecio($precio);
$producto->setStockActual($stockActual);
$producto->setIdRubro($rubro);

$producto->actualizar();


header('Location: ../listado.php?mensaje=2');

?>
