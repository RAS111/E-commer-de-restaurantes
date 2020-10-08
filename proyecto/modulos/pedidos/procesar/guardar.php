<?php

require_once "../../../class/Pedido.php";
require_once "../../../class/DetallePedido.php";

$fechaPedido = $_POST['fecha'];
$cliente = $_POST['cliente'];
$tipoEnvio = $_POST['tipoEnvio'];

$pedido = new Pedido();
$pedido->setIdCliente($cliente);
$pedido->setFecha($fechaPedido);
$pedido->setTipoEnvio($tipoEnvio);
$pedido->guardar();

foreach ($_POST['items'] as $item) {
	$detallePedido = new DetallePedido();
	$detallePedido->setIdItem($item['id_item']);
	$detallePedido->setIdPedido($pedido->getIdPedido());
	$detallePedido->setCantidad($item['cantidad']);
	$detallePedido->setPrecio($item['precio']);
	$detallePedido->guardar();
}



?>
