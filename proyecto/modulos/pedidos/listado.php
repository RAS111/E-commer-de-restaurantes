<?php

require_once '../../class/Pedido.php';

const SIN_ACCION = 0;
const PEDIDO_GUARDADO = 1;
const PEDIDO_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoPedido = Pedido::obtenerTodos();

?>

<!DOCTYPE html>
<html>
	<?php
		include_once('../../head.php');
	?>
<body>

	<?php require_once '../../menu.php';?>
	<?php require_once "../../header.php"; ?>
	<?php require_once "../../sidebar.php"; ?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Listado de Pedidos</h4>
					</div>
					<div class="pb-20">
						<a class="dropdown-item" href="alta.php" title="Agregar Pedido"><i class="dw dw-add-user"></i></a>
	
						<?php if($mensaje == PEDIDO_GUARDADO):?>
							<h3>Pedido Guardado</h3>
							<br>
						<?php elseif($mensaje == PEDIDO_MODIFICADO):?>
							<h3>Pedido Modificado</h3>
							<br>
						<?php  endif;?>
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">ID</th>
									<th>Cliente</th>
									<th>Fecha</th>
									<th>Tipo de Envio</th>
									<th>Estado</th>
									
									<th class="datatable-nosort">Accion</th>
								</tr>
							</thead>
							<tbody>

								<?php foreach ($listadoPedido as $pedido): ?>

								<tr>
									<td><?=$pedido->getIdPedido();?></td>
									<td><?=$pedido->cliente;?></td>
									<td><?=$pedido->getFecha();?> </td>
									<td><?=$pedido->getTipoEnvio();?></td>
									<td><?=$pedido->pedidoEstado;?></td>
									
									<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="detalle.php?id=<?=$pedido->getIdPedido();?>"><i class="dw dw-eye"></i> Ver</a>
											<?php if($pedido->pedidoEstado->getIdPedidoEstado() != 4):?>
											<a class="dropdown-item" href="modificar.php?id=<?=$pedido->getIdPedido();?>"><i class="dw dw-edit2"></i> Modificar</a>
											<a class="dropdown-item" href="#" onclick="modificarEstado(<?php echo $pedido->getIdPedido(); ?>, <?=$pedido->pedidoEstado->getIdPedidoEstado();?>);"><i class="dw dw-edit2"></i> Cambiar Estado
											</a>
											<?php endif;?>
											<?php if($pedido->pedidoEstado->getIdPedidoEstado() == 4):?>
											<a class="dropdown-item" href="listado_factura.php"><i class="dw dw-list3"></i> Pedidos para Facturar</a>	
											<?php endif;?>
										</div>
									</div>
									</td>
								</tr>
								<?php endforeach ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal lista de productos -->
    <div class="modal fade" id="id_estado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Estados</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
					require_once '../../class/PedidoEstado.php';

					$listadoEstados = PedidoEstado::obtenerTodos();
					
				?>
				<form class="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method="POST" action="procesar/cambiar_estado.php" >
					<div class="modal-body">
					
						<section>
							<div class="row">
								<div class="col-md-12" >
									<div class="form-group">
										<input type="hidden" name="txtIdPedido" id="txtIdPedido" value="<?php echo $pedido->getIdPedido(); ?>">
										<select name="cboEstado" id="cboEstado"  class="custom-select form-control" >
											<option value="0">Seleccionar</option>
											<?php foreach ($listadoEstados as $estado):
												$selected = '';
												if ($pedido->getIdPedidoEstado() == $estado->getIdPedidoEstado()) {
													$selected = "SELECTED";
												}
											?>
												<option value="<?php echo $estado->getIdPedidoEstado(); ?>"<?php echo $selected; ?>>
													<?php echo $estado; ?>
												</option>

											<?php endforeach ?>
										</select>
									</div>
								</div>
							</div>
						</section>
					
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-success" value="Guardar">
					</div>
           		</div>
            </form>
        </div>
    </div>
	<?php include_once('../../file_js.php');?>

<script type="text/javascript">
function modificarEstado(id, idEstado){
    $('#id_estado').modal('show');
    $('#txtIdPedido').val(id);
    $('#cboEstado').val(idEstado);
}

</script>
</body>
</html>