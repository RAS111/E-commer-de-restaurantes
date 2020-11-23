<?php

require_once '../../class/Usuario.php';
require_once '../../class/Factura.php';
require_once '../../class/Pedido.php';
require_once '../../class/DetallePedido.php';

$idFactura = $_GET['id'];

$factura = Factura::obtenerPorId($idFactura);
$listadoDetallePedido = DetallePedido::obtenerPorIdFactura($idFactura);
$listadoUsuarios = Usuario::obtenerTodos();
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
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<h4 class="text-black h4">Registrar Nota de Credito</h4>
					</div>
					<?php if (isset($_SESSION['mensaje_error'])) : ?>

							<font color="red">
								<?php echo $_SESSION['mensaje_error'] ?>
							</font>

							<br><br>

					<?php
							unset($_SESSION['mensaje_error']);
						endif;
					?>	
					<hr>
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">
							<section>
								<input type="hidden" name="txtIdFactura" id="txtIdFactura" value="<?php echo $factura->getIdFactura(); ?>">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Fecha</label>
											<input type="date" name="txtFecha" id="txtFecha" class="form-control date-picker" placeholder="Seleccionar Fecha de Nacimiento" value="<?php echo date("Y-m-d");?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Usuario</label>
											<select name="cboUsuario" id="cboUsuario" class="custom-select2 form-control">
												<option value="0">Seleccionar</option>
												<?php foreach ($listadoUsuarios as $usuario): ?>

													<option value="<?php echo $usuario->getIdUsuario(); ?>">
														<?php echo $usuario->getUsername(); ?>
													</option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Motivo</label>
											<select name="cboMotivo" id="cboMotivo" class="custom-select form-control" id="cboTipoFactura">
											<option value="0">Seleccionar</option>     
											<option value="Corregir datos en la factura">
												Corregir datos, valores o información diligenciada en la factura
											</option>
											<option value="Devoluciones del cliente por inconformidad">
												Devoluciones del cliente por inconformidad
											</option>
											<option value="Se emitio una factura por error">
												Se emitió una factura por error
											</option>
											<option value="Diferencia del precio real y el importe cobrado">
												Diferencia del precio real y el importe cobrado
											</option>
											<option value="Cambio de Producto">
												Cambio de Producto
											</option>
											<option value="Cambio de Producto">
												Otro
											</option>
											</select>
										</div>
									</div>	
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Observacion</label>
											<textarea class="form-control" name="txtObservacion" id="txtObservacion"></textarea>
										</div>
									</div>
								</div>
								<hr>
								<div class="pd-20">
									<h4 class="text-blue h4">Detalle de la Factura</h4>
								</div>
								<table class="data-table table stripe hover nowrap">
									<thead>
										<tr>
											<th>Factura N°</th>
											<th>Fecha</th>
											<th>Tipo de Factura</th>		
											<th>Forma de pago</th>
											
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?=$factura->getNumero();?></td>
											<td><?=$factura->getFecha();?> </td>
											<td><?=$factura->getTipo();?></td>
											<td><?=$factura->formaPago;?></td>
											
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
											<th>Fecha</th>
											<th>Tipo de Envio</th>		
											<th>Cliente</th>
												
										</tr>
									</thead>
									<tbody>
										<tr>
											
											<td><?=$factura->pedido->getFecha();?> </td>
											<td><?=$factura->pedido->getTipoEnvio();?></td>
											<td><?=$factura->pedido->cliente;?></td>
				
										</tr>
									</tbody>
								</table>
								<hr>
								<table id="id_detalle_venta" class="data-table table stripe hover nowrap">
									<thead>
										<tr>
											<th class="table-plus datatable-nosort">ID</th>
											<th>Menu</th>
											<th>Cantidad</th>
											<th>Precio Unitario</th>
											<th>Subtotal</th>
											
										</tr>
									</thead>
									<tbody>
										<?php foreach ($listadoDetallePedido as $detallePedido): ?>
											<tr>
												<td><?=$detallePedido->getIdItem();?></td>
												<td><?=$detallePedido->item->getNombre();?></td>
												<td><?=$detallePedido->getCantidad();?></td>
												<td><?=$detallePedido->getPrecio();?></td>
												<td><?=$detallePedido->calcularSubtotal();?></td>				
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
								<div class="row row-cols-2">
									<div class="col-6 mt-3 pt-3"></div>
									<div class="col-6 mt-3 pt-3">
										<p class="lead">Totales</p>
										<div class="table-responsive">
											<table class="table table-sm">
												<tbody>
													<tr>
														<th class="w-50">Total:</th>
														<td id="id_total"><?=$factura->pedido->calcularTotal();?></td>
													</tr>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</section>
							<input type="button" class="btn btn-success" value="Guardar" onclick="validarDatos();">	
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="../../static/js/notas_de_creditos/validaciones.js"></script>
	<?php include_once('../../file_js.php');?>
</body>
</html>