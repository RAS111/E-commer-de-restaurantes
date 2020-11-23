<?php
require_once "../../class/Producto.php";	
$listadoProducto = Producto::obtenerTodos();

$producto = 0;
$porcentaje = 0;

if (isset($_GET['cboProductos']) ) {
    $producto = $_GET['cboProductos'];
}
if (isset($_GET['txtPorcentaje'])) {
    $porcentaje = $_GET['txtPorcentaje'];
}

$sql = "UPDATE item ".
	   "INNER JOIN menu ON menu.id_item = item.id_item ".
	   "INNER JOIN receta_producto ON receta_producto.id_menu = menu.id_menu ".
	   "INNER JOIN producto ON producto.id_producto = receta_producto.id_producto ".
	   "set precio = precio + (precio * $porcentaje / 100) WHERE producto.id_producto = $producto";

$mysql = new MySQL();
$datos = $mysql->consultar($sql);


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
					<div class="clearfix">
						<h4 class="text-black h4">Aumento Menu</h4>
					</div>	
					<hr>	
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method="GET" >
							<section>
								<div class="row">
									<div class="col-md-6" >
										<div class="form-group ">
											<label>Productos </label>
											<select name="cboProductos" id="cboProductos"  class="custom-select form-control">
												<option value="0">Seleccionar</option>
												<?php foreach ($listadoProducto as $producto): ?>

													<option value="<?php echo $producto->getIdProducto(); ?>">
														<?php echo $producto; ?>
													</option>

												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="col-md-6" >
										<div class="form-group ">
											<label>Porcentaje </label>
											 <input type="text" id="txtPorcentaje"  class="form-control" name="txtPorcentaje" >
											</select>
										</div>
									</div>
								</div>	
							</section>
							<input type="submit" onclick="guardarFormVentas();" class="btn btn-success" value="Guardar">			
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>			 

	<?php include_once('../../file_js.php');?>

</body>
</html>