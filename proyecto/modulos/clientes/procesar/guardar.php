<?php

require_once "../../../class/Cliente.php";

session_start();

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$sexo = $_POST['cboSexo'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];

// VALIDACIONES
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

// GUARDAR CLIENTE

$cliente = new Cliente($nombre, $apellido);
$cliente->setSexo($sexo);
$cliente->setFechaNacimiento($fechaNacimiento);
$cliente->setIdTipoDocumento($tipoDocumento);
$cliente->setNumeroDocumento($numeroDocumento);


$cliente->guardar();

// REDIRECCION
header('Location: ../listado.php?mensaje=1');

?>

