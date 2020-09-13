<?php

require_once '../../class/Producto.php';

const SIN_ACCION = 0;
const PRODUCTO_GUARDADO = 1;
const PRODUCTO_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoProductos = Producto::obtenerTodos();

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
						<h4 class="text-blue h4">Listado de Productos</h4>
					</div>
					<div class="pb-20">
						<a class="dropdown-item" href="alta.php" title="Agregar Producto"><i class="dw dw-add-user"></i></a>
						<?php if($mensaje == PRODUCTO_GUARDADO):?>
							<h3>Producto Guardado</h3>
							<br>
						<?php elseif($mensaje == PRODUCTO_MODIFICADO):?>
							<h3>Producto Modificado</h3>
							<br>
						<?php  endif;?>
						
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">ID</th>
									<th>Nombre</th>
									<th>Precio</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($listadoProductos as $producto): ?>

									<tr>
										<td> <?= $producto->getIdProducto(); ?> </td>
										<td> <?= $producto->getNombre(); ?> </td>
										<td> <?= $producto->getPrecio()."$"; ?> </td>	
										<td>
											<div class="dropdown">
												<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
													<i class="dw dw-more"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
													<a class="dropdown-item" href="detalle.php?id=<?=$producto->getIdProducto();?>"><i class="dw dw-eye"></i> View</a>
													<a class="dropdown-item" href="modificar.php?id=<?=$producto->getIdProducto();?>"><i class="dw dw-edit2"></i> Modificar</a>	
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
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script>
</body>
</html>