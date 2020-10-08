<?php

require_once "../../class/Modulo.php";
require_once "../../class/Perfil.php";


$idPerfil = $_GET['id'];

$perfil = Perfil::obtenerPorId($idPerfil);
$listadoModulos = Modulo::obtenerTodos();

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
						<h4 class="text-black h4">Modificar Perfiles</h4>
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
						<form class="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method="POST" action="procesar/modificar.php">
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="hidden" name="txtIdPerfil" value="<?php echo $idPerfil; ?>">
											<label>Descripcion:</label>
											<input type="text" name="txtDescripcion" class="form-control" value="<?php echo $perfil->getDescripcion(); ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Modulos</label>
											<select name="cboModulos[]" class="custom-select2 form-control" multiple="multiple" style="width: 100%;">
												<?php foreach ($listadoModulos as $modulo) :?>

													<?php

													$selected = '';
													$idModulo = $modulo->getIdModulo();

													if ($perfil->tieneModulo($idModulo)) {
														$selected = "SELECTED";
													}

													?>

													<option value="<?php echo $modulo->getIdModulo(); ?>" <?php echo $selected ?> >
														<?php echo $modulo ?>
													</option>

												<?php endforeach ?>

											</select>
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