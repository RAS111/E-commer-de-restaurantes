<?php

require_once '../../class/Producto.php';

$id = $_GET['id'];

$producto = Producto::obtenerPorId($id);
//highlight_string(var_export($producto,true));
//exit;

?>

<!DOCTYPE html>
<html>
	<?php include_once('../../head.php');?>
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
						<h4 class="text-black h4">Detalle del producto <?=$producto;?> </h4>
					</div>
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">ID</th>
								<th>Precio</th>
								<th>Stock Actual</th>
								
							</tr>
						</thead>
						<tbody>
							<td><?=$producto->getIdProducto();?></td>
							<td><?=$producto->getPrecio();?>$</td>
							<td><?=$producto->getStockActual();?></td>
							
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php include_once('../../file_js.php');?>	
</body>
</html>