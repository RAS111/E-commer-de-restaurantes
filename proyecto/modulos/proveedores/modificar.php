<?php

require_once '../../class/Proveedor.php';
require_once '../../class/TipoDocumento.php';
$id = $_GET['id'];

$proveedor = Proveedor::obtenerPorId($id);

$listadoTipoDocumento = TipoDocumento::obtenerTodos();
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
						<h4 class="text-black h4">Modificar Proveedor</h4>
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
											<input type="hidden" name="txtId" value="<?= $proveedor->getIdProveedor(); ?>">
											<label>Nombre</label>
											<input type="text" name="txtNombre" id="txtNombre" class="form-control" value="<?= $proveedor->getNombre(); ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Apellido</label>
											<input type="text" name="txtApellido" id="txtApellido" class="form-control" value="<?= $proveedor->getApellido(); ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Sexo</label>
											<select name="cboSexo" id="cboSexo" class="custom-select form-control">
												<option value="0">Sin Seleccionar</option>
												<?php if ($proveedor->getSexo() == "Femenino"): ?>
													<option value="Femenino" selected><?=$proveedor->getSexo()?></option>
													<option value="Masculino">Masculino</option>
													<option value="Otro">Otro</option>
												<?php elseif($proveedor->getSexo() == "Masculino"):?>
													<option value="Femenino">Femenino</option>
													<option value="Masculino" selected><?=$proveedor->getSexo()?></option>
													<option value="Otro">Otro</option>
												<?php elseif($proveedor->getSexo() == "Otro"):?>
													<option value="Femenino">Femenino</option>
													<option value="Masculino">Masculino</option>
													<option value="Otro" selected><?=$proveedor->getSexo()?></option>
												<?php endif ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Fecha Nacimiento</label>
											<input type="date" name="txtFechaNacimiento"  class="form-control date-picker" id="txtFechaNacimiento" value="<?= $proveedor->getFechaNacimiento(); ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Tipo Documento </label>
											<select name="cboTipoDocumento" id="cboTipoDocumento"  class="custom-select form-control">
												<option value="0">Seleccionar</option>

												<?php
												foreach ($listadoTipoDocumento as $tipoDocumento):
													$selected = '';
													if ($proveedor->getIdTipoDocumento() == $tipoDocumento->getIdTipoDocumento()) {
														$selected = "SELECTED";
													}
												?>

												<option value="<?php echo $tipoDocumento->getIdTipoDocumento(); ?>" <?php echo $selected; ?>>
														<?php echo $tipoDocumento; ?>
												</option>

												<?php endforeach ?>

											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Numero Documento</label>
											<input type="text" name="txtNumeroDocumento" id="txtNumeroDocumento" class="form-control" value="<?= $proveedor->getNumeroDocumento(); ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Razon Social</label>
											<input type="text" name="txtRazonSocial" id="txtRazonSocial" class="form-control" value="<?= $proveedor->getRazonSocial(); ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Cuil</label>
											<input type="text" name="txtCuil" id="txtCuil" class="form-control" value="<?= $proveedor->getCuil(); ?>">
										</div>
									</div>
								</div>
							</section>
							<input type="button" class="btn btn-success" value="Actualizar" onclick="validarDatos();">	
							<!--Con JS<input type="button" value="Guardar" onclick="validarDatos();">-->	
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="../../static/js/proveedores/validaciones.js"></script>
	<script src="../../static/vendors/scripts/core.js"></script>
	<script src="../../static/vendors/scripts/script.min.js"></script>
	<script src="../../static/vendors/scripts/process.js"></script>
	<script src="../../static/vendors/scripts/layout-settings.js"></script>
	<script src="../../static/src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="../../static/vendors/scripts/steps-setting.js"></script>
										
</body>
</html>