<?php

require_once "../../../class/FormaPago.php";

session_start();

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];

$formaPago = FormaPago::obtenerPorId($id);
$formaPago->setDescripcion($descripcion);

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

$formaPago->actualizar();

header("Location:../listado.php?mensaje=2");

?>