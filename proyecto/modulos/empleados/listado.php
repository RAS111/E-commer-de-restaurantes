<?php

require_once '../../class/Empleado.php';

const SIN_ACCION = 0;
const EMPLEADO_GUARDADO = 1;
const EMPLEADO_MODIFICADO = 2;


if(isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
}else {
	$mensaje = SIN_ACCION;
}

$listadoEmpleados = Empleado::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Empleados</title>
</head>
<body>

	<h1>Listado de Empleados</h1>

	<a href="alta.php">
		<img src="../../imagenes/iconos/add.png" title="Agregar Empleado">
	</a>
	<br><br>
	
	<?php if($mensaje == EMPLEADO_GUARDADO):?>
		<h3>Empleado Guardado</h3>
		<br>
	<?php elseif($mensaje == EMPLEADO_MODIFICADO):?>
		<h3>Empleado Modificado</h3>
		<br>
	<?php  endif;?>

	<table border="1">
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listadoEmpleados as $empleado): ?>

			<tr>
				<td> <?= $empleado->getNombre(); ?> </td>
				<td> <?= $empleado->getApellido(); ?> </td>
				<td>
					<a href="detalle.php?id=<?=$empleado->getIdEmpleado();?>">
						<img src="../../imagenes/iconos/view.png" title="Ver Empleado">
					</a>
					-
					<a href="modificar.php?id=<?=$empleado->getIdEmpleado();?>">
						<img src="../../imagenes/iconos/update.png" title="Modificar Empleado">
					</a>
					-
					<a href="eliminar.php?id=<?=$empleado->getIdEmpleado();?>">
						<img src="../../imagenes/iconos/delete.png" title="Eliminar Empleado">
					</a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>
	<!--<?php require_once '../../menu.php';?>-->
</body>
</html>