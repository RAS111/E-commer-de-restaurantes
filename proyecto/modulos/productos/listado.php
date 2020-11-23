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
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Producto Guardado</strong>
								<button type="button" class="close" data-dismiss="alert" aria-label="close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php elseif($mensaje == PRODUCTO_MODIFICADO):?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Producto Modificado</strong>
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
				<?php require_once "../catalogo/altaImagen.php"?>
				
           		</div>
            </form>
        </div>
    </div>
	<?php 
		include_once('../../file_js.php');
	?>
	
</body>
</html>