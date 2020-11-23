<?php

require_once "../../../class/Proveedor.php";

session_start();

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$sexo = $_POST['txtSexo'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];
$razonSocial = $_POST['txtRazonSocial'];
$cuil = $_POST['txtCuil'];

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
}elseif (strlen(trim($apellido)) < 3) {
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
	$_SESSION['mensaje_error'] = "la fecha no debe estar vacia";
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
} elseif (strlen(trim($numeroDocumento)) < 8 ){
	$_SESSION['mensaje_error'] = "el numero de documento debe contener al menos 8 caracteres";
	header('Location: ../alta.php');
	exit;
}

if(empty(trim($razonSocial))) {
	$_SESSION['mensaje_error'] = "la razon social no debe estar vacia";
	header('Location: ../alta.php');
	exit;
} elseif (strlen(trim($razonSocial)) < 3 ){
	$_SESSION['mensaje_error'] = "la razon social ebe contener al menos 3 caracteres";
	header('Location: ../alta.php');
	exit;
}

if(empty(trim($cuil))) {
	$_SESSION['mensaje_error'] = "el cuil no debe estar vacio";
	header('Location: ../alta.php');
	exit;
} elseif (strlen(trim($cuil)) < 11 ){
	$_SESSION['mensaje_error'] = "el cuil debe contener 11 caracteres para ser valido";
	header('Location: ../alta.php');
	exit;
}

// Guardar nuevo proveedor

$proveedor = new Proveedor($nombre, $apellido);
$proveedor->setSexo($sexo);
$proveedor->setFechaNacimiento($fechaNacimiento);
$proveedor->setIdTipoDocumento($tipoDocumento);
$proveedor->setNumeroDocumento($numeroDocumento);
$proveedor->setRazonSocial($razonSocial);
$proveedor->setCuil($cuil);

$proveedor->guardar();

// Redireccion
header('Location: ../listado.php?mensaje=1');

?>