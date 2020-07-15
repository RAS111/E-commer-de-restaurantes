<?php

require_once "../../../class/Proveedor.php";

session_start();

$id = $_POST['txtId'];
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
	header('Location: ../modificar.php?id=' .$id);
	exit;
} elseif (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "el nombre debe contener al menos 3 caracteres";
	header('Location: ../modificar.php?id=' .$id);
	exit;
}

if (empty(trim($apellido))) {
	$_SESSION['mensaje_error'] = "el apellido no debe estar vacio";
	header('Location: ../modificar.php?id=' .$id);
	exit;
}elseif (strlen(trim($apellido)) < 3) {
	$_SESSION['mensaje_error'] = "el apellido debe contener al menos 3 caracteres";
	header('Location: ../modificar.php?id=' .$id);
	exit;
}

if ((int) $tipoDocumento == 0) {
	$_SESSION['mensaje_error'] = "debe seleccionar el documento";
	header('Location: ../modificar.php?id=' .$id);
	exit;
}

if(empty(trim($numeroDocumento))) {
	$_SESSION['mensaje_error'] = "El numero de documento no debe estar vacio";
	header('Location: ../modificar.php?id=' .$id);
	exit;
} elseif (strlen(trim($numeroDocumento)) < 8 ){
	$_SESSION['mensaje_error'] = "el numero de documento debe contener al menos 8 caracteres";
	header('Location: ../modificar.php?id=' .$id);
	exit;
}

if(empty(trim($razonSocial))) {
	$_SESSION['mensaje_error'] = "la razon social no debe estar vacia";
	header('Location: ../modificar.php?id=' .$id);
	exit;
} elseif (strlen(trim($razonSocial)) < 3 ){
	$_SESSION['mensaje_error'] = "la razon social ebe contener al menos 3 caracteres";
	header('Location: ../modificar.php?id=' .$id);
	exit;
}

if(empty(trim($cuil))) {
	$_SESSION['mensaje_error'] = "el cuil no debe estar vacio";
	header('Location: ../modificar.php?id=' .$id);
	exit;
} elseif (strlen(trim($cuil)) < 11 ){
	$_SESSION['mensaje_error'] = "el cuil debe contener 11 caracteres para ser valido";
	header('Location: ../modificar.php?id=' .$id);
	exit;
} 

// Modificar Proveedor

$proveedor = Proveedor::obtenerPorId($id);
$proveedor->setNombre($nombre);
$proveedor->setApellido($apellido);
$proveedor->setSexo($sexo);
$proveedor->setFechaNacimiento($fechaNacimiento);
$proveedor->setIdTipoDocumento($tipoDocumento);
$proveedor->setNumeroDocumento($numeroDocumento);
$proveedor->setRazonSocial($razonSocial);
$proveedor->setCuil($cuil);

$proveedor->actualizar();

// Redireccion

header('Location: ../listado.php?mensaje=2');

?>