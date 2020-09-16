<?php

require_once '../../class/Pedido.php';

$id = $_GET['id'];

$pedido = Pedido::obtenerPorId($id);


?>

<!DOCTYPE html>
<html>
	<?php include_once('../../head.php'); ?>	
<body>
	<?php require_once '../../menu.php';?>
	<?php require_once "../../header.php";?>
	<?php require_once "../../sidebar.php";?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Detalle del Pedido</h4>
					</div>

					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>ID</th>
								<th>Fecha</th>
								<th>Tipo de Envio</th>		
								<th>Cliente</th>
								<th>Empleado</th>
								<th>Estado</th>
								<th>Id item</th>
								<th>Cantidad</th>
								<th>Total</th>
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?=$pedido->getIdPedido();?> </td>
								<td><?=$pedido->getFecha();?> </td>
								<td><?=$pedido->getTipoEnvio();?></td>
								<td><?=$pedido->cliente;?></td>
								<td><?=$pedido->empleado;?></td>
								<td><?=$pedido->pedidoEstado;?></td>
								<td><?=$pedido->arrDetallePedido->getIdItem();?></td>
								<td><?=$pedido->arrDetallePedido->getCantidad();?></td>
								<td><?=$pedido->arrDetallePedido;?></td>
								
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php include_once('../../file_js.php');?>
</body>
</html>