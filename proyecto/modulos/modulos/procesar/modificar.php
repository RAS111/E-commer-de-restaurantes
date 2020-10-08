<?php
require_once "../../../class/Modulo.php";

session_start();

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];
$directorio = $_POST['txtDirectorio'];

$modulo = Modulo::obtenerPorId($id);
$modulo->setDescripcion($descripcion);
$modulo->setDirectorio($directorio);

//VALIDACIONES
if(empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "La descripción no debe estar vacio";
	header('Location: ../modificar.php?id=$id');
	exit;
} elseif (strlen(trim($descripcion)) < 3) {
	$_SESSION['mensaje_error'] = "La descripción debe contener al menos 3 caracteres";
	header('Location: ../modificar.php?id=$id');
	exit;
}

if(empty(trim($directorio))) {
	$_SESSION['mensaje_error'] = "El directorio no debe estar vacio";
	header('Location: ../modificar.php?id=$id');
	exit;
} elseif (strlen(trim($directorio)) < 3) {
	$_SESSION['mensaje_error'] = "El directorio debe contener al menos 3 caracteres";
	header('Location: ../modificar.php?id=$id');
	exit;
}

$modulo->actualizar();


header("location:../listado.php?mensaje=2");

?>