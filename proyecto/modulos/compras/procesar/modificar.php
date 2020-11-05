<?php
require_once "../../../class/Compra.php";
require_once "../../../class/DetalleCompra.php";

$idCompra = $_POST['idCompra'];
$fecha = $_POST['fecha'];
$numero = $_POST['numero'];
$descripcion = $_POST['descripcion'];
$proveedor = $_POST['proveedor'];
$formaPago = $_POST['formaPago'];

$compra = Compra::obtenerPorId($idCompra);
$compra->setIdProveedor($proveedor);
$compra->setFecha($fecha);
$compra->setNumero($numero);
$compra->setDescripcion($descripcion);
$compra->setIdFormaPago($formaPago);
$compra->actualizar();



$detalleCompra = new DetalleCompra();

$detalleCompra->eliminar($compra->getIdCompra());


foreach ($_POST['items'] as $item) {
	$detalleCompra = new DetalleCompra();
	$detalleCompra->setIdProducto($item['id']);
	$detalleCompra->setIdCompra($compra->getIdCompra());
	$detalleCompra->setCantidad($item['cantidad']);
	$detalleCompra->setPrecio($item['precio']);
	$detalleCompra->guardar();
}




?>