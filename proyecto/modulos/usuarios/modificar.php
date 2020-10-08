<?php

require_once '../../class/Usuario.php';
require_once '../../class/TipoDocumento.php';
require_once '../../class/Perfil.php';

$id = $_GET['id'];

$user = Usuario::obtenerPorId($id);

$listadoTipoDocumento = TipoDocumento::obtenerTodos();
$listadoPerfil = Perfil::obtenerTodos();


?>

<!DOCTYPE html>
<html>
	<?php include_once('../../head.php'); ?>
<!--<script src="../../static/js/usuarios/validaciones.js"></script>-->
<body>
	<?php require_once '../../menu.php';?>
	<?php require_once "../../header.php";?>
	<?php require_once "../../sidebar.php";?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<h4 class="text-black h4">Modificar Usuario</h4>
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
						<form class="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method="POST" action="procesar/modificar.php" enctype="multipart/form-data">
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="hidden" name="txtId" value="<?= $user->getIdUsuario(); ?>">
											<label>Nombre</label>
											<input type="text" name="txtNombre" id="txtNombre" class="form-control" value="<?= $user->getNombre(); ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Apellido</label>
											<input type="text" name="txtApellido" id="txtApellido" class="form-control" value="<?= $user->getApellido(); ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Sexo</label>
											<input type="text" name="txtSexo" id="txtSexo" class="custom-select form-control"  value="<?= $user->getSexo(); ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Fecha Nacimiento</label>
											<input type="date" name="txtFechaNacimiento" id="txtFechaNacimiento" class="form-control date-picker" value="<?= $user->getFechaNacimiento(); ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Tipo Documento </label>
											<select name="cboTipoDocumento" id="cboTipoDocumento" class="custom-select form-control">
												<option value="0">Seleccionar</option>

												<?php
												foreach ($listadoTipoDocumento as $tipoDocumento):
													$selected = '';
													if ($user->getIdTipoDocumento() == $tipoDocumento->getIdTipoDocumento()) {
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
											<input type="text" name="txtNumeroDocumento" id="txtNumeroDocumento" class="form-control" value="<?= $user->getNumeroDocumento(); ?>">
										</div>
									</div>	
								</div>	
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Nombre de usuario</label>
											<input type="text" name="txtNombreUsuario" id="txtNombreUsuario" class="form-control" value="<?= $user->getUsername(); ?>">
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group">
											<label>Perfil</label>
											<select name="cboPerfil" id="cboPerfil" class="custom-select form-control">
												<option value="0">Seleccionar</option>

												<?php
												foreach ($listadoPerfil as $perfil):
													$selected = '';
													if ($user->getIdPerfil() == $perfil->getIdPerfil()) {
														$selected = "SELECTED";
													}
												?>

													<option value="<?php echo $perfil->getIdPerfil(); ?>" <?php echo $selected; ?>>
														<?php echo $perfil; ?>
													</option>

												<?php endforeach ?>
											</select>
										</div>
									</div>	
								</div>	
								<div class="row">
									
									<div class="col-md-6">
										<div class="form-group">
											<label>Imagen</label> 
											<input type="file" name="fileImagen" class="form-control-file form-control ">
										</div>
									</div>	
							</section>
							<input type="submit" class="btn btn-success" value="Actualizar" onclick="validarDatos();">	
							<!--Con JS<input type="button" value="Actualizar" onclick="validarDatos();">	-->	
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