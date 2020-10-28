<?php

require_once "../../../class/Factura.php";
require_once '../../../class/Producto.php';

$fecha = $_POST['txtFecha'];
$numero = $_POST['txtNumero'];
$tipoFactura = $_POST['cboTipoFactura'];
$formaPago = $_POST['cboFormaPago'];
$idPedido = $_POST['txtIdPedido'];

$factura = new Factura();
$factura->setFecha($fecha);
$factura->setNumero($numero);
$factura->setTipo($tipoFactura);
$factura->setIdFormaPago($formaPago);
$factura->setIdPedido($idPedido);

$factura->guardar();

$producto = Producto::obtenerPorIdPedido($idPedido);
$producto->descontarStock($idPedido);

header('Location: ../listado.php?mensaje=1');
?>