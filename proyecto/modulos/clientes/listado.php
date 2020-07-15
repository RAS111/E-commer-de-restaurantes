<?php

require_once '../../class/Cliente.php';

const SIN_ACCION = 0;
const CLIENTE_GUARDADO = 1;
const CLIENTE_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoClientes = Cliente::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado Clientes</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../static/css/style4.css">
	<script src="../../static/js/listado.js"></script>
</head>
<body>

	<header>
	<?php require_once '../../menu.php';?>
	</header>
	<div class="container">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h1>Listado de Clientes</h1>
					</div>
					<div class="col-sm6">
						<a href="/E-commerce-de-restaurantes/proyecto/modulos/clientes/alta.php" class="btn btn-success" data-toggle="modal">
							<i  class="material-icons"> &#xE147;</i> <span> Agregar Cliente</span>
							<!--<img src="../../imagenes/iconos/add.png" title="Agregar cliente">-->
						</a>
						<!--<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i><span>Eliminar Cliente</span></a>-->
						<?php if($mensaje == CLIENTE_GUARDADO):?>
							<h3>Cliente Guardado</h3>
							<br>
						<?php elseif($mensaje == CLIENTE_MODIFICADO):?>
							<h3>Cliente Modificado</h3>
							<br>
						<?php  endif;?>
					</div>
				</div>
			</div>
				<table class="table table-striped table-hover"">
					<thead>
						<tr>
							<!--<th>
								<span class="custom-checkbox">
									<input type="checkbox" name="" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>-->
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($listadoClientes as $cliente): ?>
						<tr>
							<!--<td>
								<span class="custom-checkbox">
									<input type="checkbox" name="option[]" id="checkbox1" value="1"> 
									<label for="checkbox1"></label>
								</span>
							</td>-->
						</tr>
						<tr>
							<td> <?= $cliente->getNombre(); ?> </td>
							<td> <?= $cliente->getApellido(); ?> </td>
							<!--<td>
								<a href="detalle.php?id=<?=$cliente->getIdCliente();?>">
									<img src="../../imagenes/iconos/view.png" title="Ver cliente">
								</a>
								-
								<a href="">
									<img src="../../imagenes/iconos/update.png" title="Modificar cliente">	
								</a>
											
							</td>-->
							<td>
								<a href="detalle.php?id=<?=$cliente->getIdCliente();?>">
									<img src="../../imagenes/iconos/view.png" title="Ver cliente">
								</a>
                            	<a href="modificar.php?id=<?=$cliente->getIdCliente();?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Modificar">&#xE254;</i></a>
                           
                        	</td>
						</tr>
						<?php endforeach ?>
					</tbody>
					
				</table>
			</div>		
		</div>
	</div>
	
</body>
</html>