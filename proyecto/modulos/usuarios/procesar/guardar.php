<?php

require_once "../../../class/Usuario.php";

session_start();

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$sexo = $_POST['txtSexo'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];
$username = $_POST['txtNombreUsuario'];
$password = $_POST['txtContraseña'];


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

if (empty(trim($username))) {
	$_SESSION['mensaje_error'] = "el usuario no debe estar vacio";
	header('Location: ../alta.php');
	exit;
} elseif (strlen(trim($username)) < 3) {
	$_SESSION['mensaje_error'] = "el usuario debe contener al menos 3 caracteres";
	header('Location: ../alta.php');
	exit;
}

if (empty(trim($password))) {
	$_SESSION['mensaje_error'] = "La contraseña no debe estar vacio";
	header('Location: ../alta.php');
	exit;
} elseif (strlen(trim($password)) < 5) {
	$_SESSION['mensaje_error'] = "el contraseña debe contener al menos 5 caracteres";
	header('Location: ../alta.php');
	exit;
}


// GUARDAR USUARIO

$usuario = new Usuario($nombre, $apellido);
$usuario->setSexo($sexo);
$usuario->setFechaNacimiento($fechaNacimiento);
$usuario->setIdTipoDocumento($tipoDocumento);
$usuario->setNumeroDocumento($numeroDocumento);
$usuario->setUsername($username);
$usuario->setPassword($password);

$usuario->guardar();

// REDIRECCION

header('Location: ../listado.php?mensaje=1');

?>