<?php 

require_once '../../class/DetalleCompra.php';

$idCompra = $_GET['id'];

$listadoDetalleCompra = DetalleCompra::obtenerPorIdCompra($idCompra);

print json_encode($listadoDetalleCompra);

?>