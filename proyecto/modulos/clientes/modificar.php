<?php

require_once '../../class/Cliente.php';
require_once '../../class/TipoDocumento.php';

$id = $_GET['id'];

$cliente = Cliente::obtenerPorId($id);
$listadoTipoDocumento = TipoDocumento::obtenerTodos();

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
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<h4 class="text-black h4">Modificar Clientes</h4>
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
											<input type="hidden" name="txtId" value="<?=$cliente->getIdCliente(); ?>">
											<label>Nombre</label>
											<input type="text" name="txtNombre" id="txtNombre" class="form-control" value="<?=$cliente->getNombre(); ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Apellido</label>
											<input type="text" name="txtApellido" id="txtApellido" class="form-control" class="form-control" value="<?=$cliente->getApellido(); ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Sexo</label>
											<select name="cboSexo" id="cboSexo" class="custom-select form-control">
												<option value="0">Sin Seleccionar</option>
												<?php if ($cliente->getSexo() == "Femenino"): ?>
													<option value="Femenino" selected><?=$cliente->getSexo()?></option>
													<option value="Masculino">Masculino</option>
													<option value="Otro">Otro</option>
												<?php elseif($cliente->getSexo() == "Masculino"):?>
													<option value="Femenino">Femenino</option>
													<option value="Masculino" selected><?=$cliente->getSexo()?></option>
													<option value="Otro">Otro</option>
												<?php elseif($cliente->getSexo() == "Otro"):?>
													<option value="Femenino">Femenino</option>
													<option value="Masculino">Masculino</option>
													<option value="Otro" selected><?=$cliente->getSexo()?></option>
												<?php endif ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Fecha Nacimiento</label>
											<input type="date" name="txtFechaNacimiento" class="form-control date-picker" value="<?=$cliente->getFechaNacimiento(); ?>">
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
													if ($cliente->getIdTipoDocumento() == $tipoDocumento->getIdTipoDocumento()) {
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
											<input type="text" name="txtNumeroDocumento" id="txtNumeroDocumento" class="form-control" value="<?=$cliente->getNumeroDocumento(); ?>">
										</div>
									</div>	
								</div>
							</section>
							<input type="button" class="btn btn-success" value="Actualizar" onclick="validarDatos();">	
							<!--para validaciones con js<input type="button" value="Actualizar" onclick="validarDatos();">-->			
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="../../static/js/clientes-empleados/validaciones.js"></script>
	<script src="../../static/vendors/scripts/core.js"></script>
	<script src="../../static/vendors/scripts/script.min.js"></script>
	<script src="../../static/vendors/scripts/process.js"></script>
	<script src="../../static/vendors/scripts/layout-settings.js"></script>
	<script src="../../static/src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="../../static/vendors/scripts/steps-setting.js"></script>
</body>
</html>