<?php

require_once "../../../class/Empleado.php";

session_start();

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$sexo = $_POST['txtSexo'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];

//VALIDACIOENS

if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "el nombre no debe estar vacio";
	header('Location: ../alta.php');
	exit;
} elseif (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "el nombre debe contener al menos 3 caracteres";
	header('Location: ../alta.php');
	exit;
}

if (empty(trim($apellido))) {
	$_SESSION['mensaje_error'] = "el apellido no debe estar vacio";
	header('Location: ../alta.php');
	exit;
} elseif (strlen(trim($apellido)) < 3) {
	$_SESSION['mensaje_error'] = "el apellido debe contener al menos 3 caracteres";
	header('Location: ../alta.php');
	exit;
}

if ($sexo == '0') {
	$_SESSION['mensaje_error'] = "debe seleccionar el sexo";
	header("location: ../alta.php");
	exit;
}

if(empty(trim($fechaNacimiento))) {
	$_SESSION['mensaje_error'] = "la fecha no debe estar vacio";
	header('Location: ../alta.php');
	exit;
} elseif($fechaNacimiento > date("Y-m-d")){
	$_SESSION['mensaje_error'] = "la fecha ingresada es incorrecta";
	header('Location: ../alta.php');
	exit;
}

if ((int) $tipoDocumento == 0) {
	$_SESSION['mensaje_error'] = "debe seleccionar el documento";
	header("location: ../alta.php");
	exit;
}

if(empty(trim($numeroDocumento))) {
	$_SESSION['mensaje_error'] = "El numero de documento no debe estar vacio";
	header('Location: ../alta.php');
	exit;
} elseif(strlen(trim($numeroDocumento)) < 8 ){
	$_SESSION['mensaje_error'] = "el numero de documento debe contener al menos 8 caracteres";
	header('Location: ../alta.php');
	exit;
}

// GUARDAR NUEVO EMPLEADO
$empleado = new Empleado($nombre, $apellido);
$empleado->setSexo($sexo);
$empleado->setFechaNacimiento($fechaNacimiento);
$empleado->setIdTipoDocumento($tipoDocumento);
$empleado->setNumeroDocumento($numeroDocumento);


$empleado->guardar();

// REDIRECCIONAR

header('Location: ../listado.php?mensaje=1');

?>
