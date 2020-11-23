<?php

require_once "../../../class/Compra.php";
require_once "../../../class/DetalleCompra.php";
require_once "../../../class/Producto.php";

$fecha = $_POST['fecha'];
$numero = $_POST['numero'];
$observacion = $_POST['observacion'];
$proveedor = $_POST['proveedor'];
$formaPago = $_POST['formaPago'];

$compra = new Compra();
$compra->setIdProveedor($proveedor);
$compra->setFecha($fecha);
$compra->setNumero($numero);
$compra->setDescripcion($observacion);
$compra->setIdFormaPago($formaPago);
$compra->guardar();

foreach ($_POST['items'] as $item) {
	$detalleCompra = new DetalleCompra();
	$detalleCompra->setIdProducto($item['id']);
	$detalleCompra->setIdCompra($compra->getIdCompra());
	$detalleCompra->setCantidad($item['cantidad']);
	$detalleCompra->setPrecio($item['precio']);
	$detalleCompra->guardar();
}

$producto = Producto::obtenerPorNumeroFactura($numero);
$producto->aumentarStock($numero);


?>