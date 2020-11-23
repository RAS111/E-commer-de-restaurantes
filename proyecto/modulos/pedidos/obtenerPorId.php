<?php 

require_once '../../class/DetallePedido.php';

$idPedido = $_GET['id'];

$listadoDetalle = DetallePedido::obtenerPorIdPedido($idPedido);

print json_encode($listadoDetalle);

?>