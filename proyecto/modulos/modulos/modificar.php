<?php

require_once '../../class/Modulo.php';

$id = $_GET['id'];

$modulo = Modulo::obtenerPorId($id);


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
						<h4 class="text-black h4">Modificar Modulos</h4>
					</div>
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method="POST" action="procesar/Modificar.php">
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="hidden" name="txtId" value="<?=$modulo->getIdModulo(); ?>">
											<label>Descripción</label>
											<input type="text" name="txtDescripcion" class="form-control" value="<?=$modulo->getDescripcion(); ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Directorio</label>
											<input type="text" name="txtDirectorio" class="form-control" value="<?=$modulo->getDirectorio(); ?>">
										</div>
									</div>
								</div>
							</section>
							<input type="submit" class="btn btn-success" value="Actualizar" onclick="validarDatos();">		
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>			
	<!-- js -->
	<script src="../../static/vendors/scripts/core.js"></script>
	<script src="../../static/vendors/scripts/script.min.js"></script>
	<script src="../../static/vendors/scripts/process.js"></script>
	<script src="../../static/vendors/scripts/layout-settings.js"></script>
	<script src="../../static/src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="../../static/vendors/scripts/steps-setting.js"></script>
</body>
</html>