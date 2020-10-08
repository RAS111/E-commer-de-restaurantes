<?php

require_once "../../class/RecetaProducto.php";

$idMenu = $_GET['id'];

$listadoProducto = Producto::obtenerTodos();



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
						<h4 class="text-black h4">Registrar Receta</h4>
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
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="hidden" name="txtIdMenuVer" value="<?php echo $idMenu; ?>">		
											<input type="hidden" name="txtId" value="<?php echo $idMenu; ?>">
											<label>cantidad</label>
											<input type="text" name="txtCantidad" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Producto</label>
											<select name="cboProducto" class="custom-select form-control">
												<option value="0">Seleccionar</option>
												<?php foreach ($listadoProducto as $producto) :?>

													<option value="<?php echo $producto->getIdProducto(); ?>">
														<?php echo $producto ?>
													</option>

												<?php endforeach ?>

											</select>
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
	<!--JS-->
	<script src="../../static/vendors/scripts/core.js"></script>
	<script src="../../static/vendors/scripts/script.min.js"></script>
	<script src="../../static/vendors/scripts/process.js"></script>
	<script src="../../static/vendors/scripts/layout-settings.js"></script>
	<script src="../../static/src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="../../static/vendors/scripts/steps-setting.js"></script>
</body>
</html>