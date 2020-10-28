<?php
require_once "../../../class/Pedido.php";
require_once "../../../class/DetallePedido.php";

$idPedido = $_POST['idPedido'];
$fecha = $_POST['fecha'];
$cliente = $_POST['cliente'];
$tipoEnvio = $_POST['tipoEnvio'];
$estadoPedido = $_POST['estadoPedido'];


$pedido = Pedido::obtenerPorId($idPedido);
$pedido->setFecha($fecha);
$pedido->setIdCliente($cliente);    //$pedido->setMetodoPago($metodoPago);
$pedido->setIdPedidoEstado($estadoPedido);
$pedido->actualizar();



$detallePedido = new DetallePedido();

$detallePedido->eliminar($pedido->getIdPedido());


foreach ($_POST['items'] as $item) {
    $detallePedido = new DetallePedido();
    $detallePedido->setIdItem($item['id']);
    $detallePedido->setIdPedido($pedido->getIdPedido());
    $detallePedido->setCantidad($item['cantidad']);
    $detallePedido->setPrecio($item['precio']);
    $detallePedido->guardar();
}


?>