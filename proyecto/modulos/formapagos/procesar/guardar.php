<?php

require_once "../../../class/FormaPago.php";

session_start();

$descripcion = $_POST['txtDescripcion'];

//VALIDACIONES
if(empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "La descripción no debe estar vacio";
	header("Location: ../alta.php");
	exit;
} elseif (strlen(trim($descripcion)) < 3) {
	$_SESSION['mensaje_error'] = "La descripción debe contener al menos 3 caracteres";
	header("Location: ../alta.php");
	exit;
}

$formaPago = new FormaPago($descripcion);

$formaPago->guardar();

header("Location:../listado.php?mensaje=1");

?>