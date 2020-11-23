<?php

require_once '../../class/NotaDeCredito.php';

const SIN_ACCION = 0;
const NOTADECREDITO_GUARDADA = 1;
const NOTADECREDITO_MODIFICADA = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoNotaDeCredito = NotaDeCredito::obtenerTodos();



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
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Listado de Notas de Credito</h4>
					</div>
					<div class="pb-20">
						<?php if($mensaje == NOTADECREDITO_GUARDADA):?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Nota de Credito Guardada</strong>
								<button type="button" class="close" data-dismiss="alert" aria-label="close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php elseif($mensaje == NOTADECREDITO_MODIFICADA):?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Nota de Credito Modificado</strong>
								<button type="button" class="close" data-dismiss="alert" aria-label="close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php  endif;?>
						
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">ID</th>
									<th>Fecha</th>
									<th>Motivo</th>
									<th>Usuario</th>
									<th>Factura N°</th>
									<th class="datatable-nosort">Accion</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($listadoNotaDeCredito as $nota): ?>
								<tr>
									<td><?=$nota->getIdNotaDeCredito();?></td>
									<td><?=$nota->getFecha();?></td>
									<td><?=$nota->getMotivo();?> </td>
									<td><?=$nota->usuario;?></td>
									<td><?=$nota->factura?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="">
													<i class="dw dw-eye"></i> Ver
												</a>
												
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
	<?php 
		include_once('../../file_js.php');
	?>

</body>
</html>