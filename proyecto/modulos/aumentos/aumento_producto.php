<?php
	
require_once "../../class/Rubro.php";

$listadoRubro = Rubro::obtenerTodos();

require_once "../../class/MySQL.php";
require_once "../../class/Producto.php";	

$rubro = 0;
$porcentaje = 0;

if (isset($_GET['cboRubro'])) {
    $rubro = $_GET['cboRubro'];
}
if (isset($_GET['txtPorcentaje'])) {
    $porcentaje = $_GET['txtPorcentaje'];
}


$sql = "UPDATE item ".
	   "INNER JOIN producto ON producto.id_item = item.id_item ".
	   "set precio = precio + (precio * $porcentaje / 100) WHERE id_rubro = $rubro";

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
						<h4 class="text-black h4">Aumento Producto</h4>
					</div>	
					<hr>	
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method="GET" >
							<section>
								<div class="row">
									<div class="col-md-6" >
										<div class="form-group ">
											<label>Rubro </label>
											<select name="cboRubro" id="cboRubro"  class="custom-select form-control">
												<option value="0">Seleccionar</option>
												<?php foreach ($listadoRubro as $rubro): ?>

													<option value="<?php echo $rubro->getIdRubro(); ?>">
														<?php echo $rubro; ?>
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