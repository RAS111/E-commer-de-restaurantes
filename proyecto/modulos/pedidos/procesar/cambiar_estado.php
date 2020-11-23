<?php 

require_once "../../../class/Pedido.php";

$id = $_POST['txtIdPedido'];
$estado = $_POST['cboEstado'];

$pedido = Pedido::obtenerPorId($id);
$pedido->setIdPedidoEstado($estado);

$pedido->actualizar();

header("location: ../listado.php");


?>