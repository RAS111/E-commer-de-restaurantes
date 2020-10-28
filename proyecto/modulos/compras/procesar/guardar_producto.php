<?php

require_once "../../../class/Producto.php";

$nombre = $_POST['txtNombre'];
$precio = $_POST['txtPrecio'];
$stockMinimo = $_POST['txtStockMinimo'];
$stockActual = $_POST['txtStockActual'];
$stockMaximo = $_POST['txtStockMaximo'];
$rubro = $_POST['cboRubro'];

// VALIDACIONES

$producto = new Producto($nombre, $precio);
$producto->setStockMinimo($stockMinimo);
$producto->setStockActual($stockActual);
$producto->setStockMaximo($stockMaximo);
$producto->setIdRubro($rubro);

$producto->guardar();

// REDIRECCION

header('Location: ../alta.php');

?>
