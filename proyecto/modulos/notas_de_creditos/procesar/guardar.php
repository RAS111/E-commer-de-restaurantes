<?php

require_once "../../../class/NotaDeCredito.php";
require_once "../../../class/Factura.php";
require_once "../../../class/Pedido.php";
require_once '../../../class/Producto.php';

/*const CANCELAR_FACTURA = 2;
const CANCELAR_PEDIDO = 6;
*/
$fecha = $_POST['txtFecha'];
$usuario = $_POST['cboUsuario'];
$motivo = $_POST['cboMotivo'];
$observacion = $_POST['txtObservacion'];
$idFactura = $_POST['txtIdFactura'];

$notaDeCredito = new NotaDeCredito();
$notaDeCredito->setFecha($fecha);
$notaDeCredito->setIdUsuario($usuario);
$notaDeCredito->setMotivo($motivo);
$notaDeCredito->setObservacion($observacion);
$notaDeCredito->setIdFactura($idFactura);

$notaDeCredito->guardar();

$factura = Factura::obtenerPorId($idFactura);
$factura->setIdFacturaEstado(2);
$factura->actualizar();

$producto = Producto::obtenerPorIdFactura($idFactura);
$producto->aumentarStockVenta($idFactura);

$pedido = Pedido::obtenerPorIdFactura($idFactura);
$pedido->setIdPedidoEstado(6);
$pedido->actualizar();


header('Location: ../listado.php?mensaje=1');
?>