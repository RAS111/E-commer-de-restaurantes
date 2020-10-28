<?php

require_once '../../../class/Pedido.php';
require_once '../../../class/Factura.php';
require_once '../../../class/Producto.php';
require_once '../../../class/DetallePedido.php';

/*$detallePedido = new DetallePedido();
$detallePedido->setCantidad(10);
$detallePedido->setPrecio(100);
$detallePedido->setIdItem(1);


$detallePedido->guardar();

highlight_string(var_export($detallePedido,true));
exit;
*/
/*$detallePedido = DetallePedido::obtenerPorId(21);
$detallePedido->setCantidad(15);
$detallePedido->actualizar();
highlight_string(var_export($detallePedido,true));
exit;*/

/*$pedido = new Pedido();
$pedido->setFecha('2020/09/22');
$pedido->setTipoEnvio("Delivery");
$pedido->setIdPedidoEstado(1);
$pedido->setIdCliente(1);
$pedido->setIdEmpleado(1);
$pedido->setIdDetallePedido(2);

$pedido->guardar();
highlight_string(var_export($pedido,true));
exit;*/

/*$pedido = Pedido::obtenerPorId(2);
$pedido->setIdCliente(2);
$pedido->actualizar();
highlight_string(var_export($pedido,true));
exit;
*/

/*$factura = new Factura ();
$factura->setFecha('2020-10-11');
$factura->setNumero(11);
$factura->setTipo('C');
$factura->setIdFormaPago(1);
$factura->setIdPedido(78);
$factura->guardar();

$producto =Producto::obtenerPorIdPedido(78);
$producto->descontarStock(78);

highlight_string(var_export($factura,true));
exit;
*/
?>