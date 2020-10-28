<?php

require_once '../../class/Pedido.php';
require_once '../../class/Factura.php';
require_once '../../class/Cliente.php';
require_once '../../class/FormaPago.php';

$id = $_GET['id'];

$pedido = Pedido::obtenerPorId($id);

$listadoCliente = Cliente::obtenerTodos();
$listadoFormaPago = FormaPago::obtenerTodos();
?>

<!DOCTYPE html>
<html>
	<?php include_once('../../head.php'); ?>
<body>
	<?php require_once '../../menu.php';?>
	<?php require_once "../../header.php"; ?>
	<?php require_once "../../sidebar.php"; ?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="pd-20 card-box mb-30">
					<div class="wizard-content">
						<div class="clearfix">
							<h4 class="text-black h4">Facturar Pedido</h4>
						</div>
						<form class="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">
							<section>
								<input type="hidden" name="txtIdPedido" id="txtIdPedido" value="<?php echo $pedido->getIdPedido(); ?>">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Fecha</label>
											<input type="date" name="txtFecha" id="txtFecha" class="form-control date-picker" placeholder="Seleccionar Fecha de Nacimiento" value="<?php echo date("Y-m-d");?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>N° de Factura</label>
											<input type="text" name="txtNumero" id="txtNumero" class="form-control">
										</div>
									</div>
								
								
									<div class="col-md-3">
										<div class="form-group">
											<label>Tipo de Factura</label>
											<select name="cboTipoFactura" class="custom-select form-control" id="cboTipoFactura">
											<option value="0">Seleccionar</option>     
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Forma de pago </label>
											<select name="cboFormaPago" id="cboFormaPago" class="custom-select form-control">
												<option value="0">Seleccionar</option>
												<?php foreach ($listadoFormaPago as $formaPago): ?>

													<option value="<?php echo $formaPago->getIdFormaPago(); ?>">
														<?php echo $formaPago; ?>
													</option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
								</div>
								<hr>
								<div class="pd-20">
									<h4 class="text-blue h4">Detalle del Cliente</h4>
								</div>
									<table class="data-table table stripe hover nowrap">
										<thead>
											<tr>
												
												<th>Fecha</th>
												<th>Tipo de Envio</th>		
												<th>Cliente</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												
												<td><?=$pedido->getFecha();?> </td>
												<td><?=$pedido->getTipoEnvio();?></td>
												<td><?=$pedido->cliente;?></td>
											</tr>
										</tbody>
									</table>
								    <hr>
									<div class="pd-20">
										<h4 class="text-blue h4">Detalle del Pedido</h4>
									</div>
										<table class="data-table table stripe hover nowrap">
										    <thead>
										      <tr>
										      	<th>ID</th>
										      	<th>Descripción</th>
										        <th>Cantidad</th>
										        
										        <th>Importe Unitario</th>
										        <th>Subtotal</th>
										      </tr>
										    </thead>

										    <tbody>
										      <?php foreach($pedido->getArrDetallePedido() as $detallePedido) :?>
										      <tr>
										      	<td><?=$detallePedido->getIdItem();?></td>
										      	<td><?=$detallePedido->item->getNombre();?></td>
										      	<td><?=$detallePedido->getCantidad();?></td>
										      	<td>$<?=$detallePedido->getPrecio();?></td>
										        <td>$<?=$detallePedido->calcularSubtotal(); ?> </td>
										      </tr>
										      <?php endforeach ?>
										    </tbody>

										</table>
									<div class="row">
										<div class="col-6 mt-3 pt-3"></div>
										<div class="col-6 mt-3 pt-3">
										  <p class="lead">Monto a pagar</p>
										  <div class="table-responsive">
										    <table class="table">
										      <tr>
										        <th>Total:</th>
										        <td>$ <?php echo $pedido->calcularTotal(); ?></td>
										      </tr>
										    </table>
										</div>
									</div>
								</div>
							</section>
							<input type="submit" class="btn btn-success" value="Guardar" onclick="validarDatos();">		
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include_once('../../file_js.php');?>
</body>
</html>