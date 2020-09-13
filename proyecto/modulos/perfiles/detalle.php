<?php

require_once '../../class/Perfil.php';

require_once "../../class/Modulo.php";

$id = $_GET['id'];

$perfil = Perfil::obtenerPorId($id);

$listadoModulos = Modulo::obtenerModulosPorIdPerfil($id);


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
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-black h4">Detalle del Perfil</h4>
					</div>
					<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">ID</th>
									<th>Descripción</th>
									<th>Modulos</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?=$perfil->getIdPerfil();?></td>
									<td><?=$perfil->getDescripcion();?></td>
									<td>
										<?php foreach ($listadoModulos as $modulo): ?>
											<?php 

											$idModulo = $modulo->getIdModulo();

											if ($perfil->tieneModulo($idModulo)) {
												echo "$modulo -";
											} 

											?>
										<?php endforeach ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		include_once('../../file_js.php');
	?>
</body>
</html>