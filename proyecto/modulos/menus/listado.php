<?php

require_once '../../class/Menu.php';

const SIN_ACCION = 0;
const MENU_GUARDADO = 1;
const MENU_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoMenus = Menu::obtenerTodos();

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
						<h4 class="text-blue h4">Listado de Menus</h4>
					</div>
					<div class="pb-20">
						<a class="dropdown-item" href="alta.php" title="Agregar Menu"><i class="dw dw-add-user"></i></a>
						<?php if($mensaje == MENU_GUARDADO):?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Menu Guardado</strong>
								<button type="button" class="close" data-dismiss="alert" aria-label="close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php elseif($mensaje == MENU_MODIFICADO):?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Menu Modificado</strong>
								<button type="button" class="close" data-dismiss="alert" aria-label="close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php  endif;?>		
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">ID</th>
									<th>Nombre</th>
									<th>Precio</th>
									<th>Recetas</th>
									<th class="datatable-nosort">Accion</th>
								</tr>
							</thead>
							<tbody>

								<?php foreach ($listadoMenus as $menu): ?>

								<tr>
									<td> <?= $menu->getIdMenu(); ?> </td>
									<td> <?= $menu->getNombre(); ?> </td>
									<td> <?= $menu->getprecio()."$"; ?> </td>
									<td> <a href="../recetas_productos/listado.php?id=<?php echo $menu->getIdMenu();  ?>" role="button" title="Editar">Ver Receta</a></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="modificar.php?id=<?=$menu->getIdMenu();?>"><i class="dw dw-edit2"></i> Modificar</a>	
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