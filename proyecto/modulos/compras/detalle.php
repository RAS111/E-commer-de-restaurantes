<?php

require_once '../../class/Compra.php';
require_once '../../class/DetalleCompra.php';

$idCompra = $_GET['id'];

$compra = Compra::obtenerPorId($idCompra);
$listadoDetalle = DetalleCompra::obtenerPorIdCompra($idCompra);

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
						<h4 class="text-black h4">Compra Nro:<?=$compra->getNumero();?></h4>
					</div>

					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>				
								<th>Fecha</th>
								<th>Descripcion</th>		
								<th>Proveedor</th>	
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?=$compra->getFecha();?> </td>
								<td><?=$compra->getDescripcion();?></td>
								<td><?=$compra->proveedor;?></td>
							</tr>
						</tbody>
					</table>
					<hr>
					<div class="pd-20">
						<h4 class="text-blue h4">Detalle del Pedido</h4>
					</div>
					<table id="id_detalle_venta" class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">ID</th>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Precio Unitario</th>
								<th>Subtotal</th>
								
							</tr>
						</thead>
						<tbody>
							<?php foreach ($listadoDetalle as $detalle): ?>
								<tr>
									<td><?=$detalle->getIdProducto();?></td>
									<td><?=$detalle->producto->getNombre();?></td>
									<td><?=$detalle->getCantidad();?></td>
									<td><?=$detalle->getPrecio();?></td>
									<td><?=$detalle->calcularSubtotal();?></td>				
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<div class="row">
						<div class="col-6 mt-3 pt-3"></div>
						<div class="col-6 mt-3 pt-3">
							<p class="lead">Monto a pagar</p>
							<div class="table-responsive">
								<table class="table table-sm">
									<tbody>
										<tr>
											<th class="w-50">Total:</th>
											<td id="id_total"><?=$compra->calcularTotal();?></td>
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<?php include_once('../../file_js.php');?>
</body>
</html>