<?php

require_once "../../../class/Barrio.php";

session_start();

$nombre = $_POST['txtNombre'];

//VALIDACIONES
if(empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "El nombre no debe estar vacio";
	header("Location: ../alta.php");
	exit;
} elseif (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "El nombre debe contener al menos 3 caracteres";
	header("Location: ../alta.php");
	exit;
}

//GUARDAR
$barrio = new Barrio($nombre);

$barrio->guardar();

//REDIRECCION
header("Location:../listado.php?mensaje=1");

?>