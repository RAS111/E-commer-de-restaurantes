<?php

require_once "../../../class/Modulo.php";

session_start();

$descripcion = $_POST['txtDescripcion'];
$directorio = $_POST['txtDirectorio'];

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

if(empty(trim($directorio))) {
	$_SESSION['mensaje_error'] = "El directorio no debe estar vacio";
	header("Location: ../alta.php");
	exit;
} elseif (strlen(trim($directorio)) < 3) {
	$_SESSION['mensaje_error'] = "El directorio debe contener al menos 3 caracteres";
	header("Location: ../alta.php");
	exit;
}

//Guardar
$modulo = new Modulo($descripcion, $directorio);

$modulo->guardar();

header("location:../listado.php?mensaje=1");

?>