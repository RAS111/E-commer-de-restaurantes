<?php

require_once "../../../class/Usuario.php";

session_start();

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$sexo = $_POST['txtSexo'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];
$username = $_POST['txtNombreUsuario'];
$password = $_POST['txtContraseña'];


//VALIDACIONES

if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "el nombre no debe estar vacio";
	header('Location: ../modificar.php?id=$id');
	exit;
} elseif (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "el nombre debe contener al menos 3 caracteres";
	header('Location: ../modificar.php?id=$id');
	exit;
}

if (empty(trim($apellido))) {
	$_SESSION['mensaje_error'] = "el apellido no debe estar vacio";
	header('Location: ../modificar.php?id=$id');
	exit;
} elseif (strlen(trim($apellido)) < 3) {
	$_SESSION['mensaje_error'] = "el apellido debe contener al menos 3 caracteres";
	header('Location: ../modificar.php?id=$id');
	exit;
}

if ((int) $tipoDocumento == 0) {
	$_SESSION['mensaje_error'] = "debe seleccionar el documento";
	header("location: ../modificar.php?id=$id");
	exit;
}

if(empty(trim($numeroDocumento))) {
	$_SESSION['mensaje_error'] = "El numero de documento no debe estar vacio";
	header('Location: ../modificar.php?id=$id');
	exit;
} elseif(strlen(trim($numeroDocumento)) < 8 ){
	$_SESSION['mensaje_error'] = "el numero de documento debe contener al menos 8 caracteres";
	header('Location: ../modificar.php?id=$id');
	exit;
}

if (empty(trim($username))) {
	$_SESSION['mensaje_error'] = "el usuario no debe estar vacio";
	header('Location: ../modificar.php?id=$id');
	exit;
} elseif (strlen(trim($username)) < 3) {
	$_SESSION['mensaje_error'] = "el usuario debe contener al menos 3 caracteres";
	header('Location: ../modificar.php?id=$id');
	exit;
}

if (empty(trim($password))) {
	$_SESSION['mensaje_error'] = "La contraseña no debe estar vacio";
	header('Location: ../modificar.php?id=$id');
	exit;
} elseif (strlen(trim($password)) < 5) {
	$_SESSION['mensaje_error'] = "el contraseña debe contener al menos 5 caracteres";
	header('Location: ../modificar.php?id=$id');
	exit;
}

// MODIFICAR USUARIO

$usuario = Usuario::obtenerPorId($id);
$usuario->setNombre($nombre);
$usuario->setApellido($apellido);
$usuario->setSexo($sexo);
$usuario->setFechaNacimiento($fechaNacimiento);
$usuario->setIdTipoDocumento($tipoDocumento);
$usuario->setNumeroDocumento($numeroDocumento);
$usuario->setUsername($username);
$usuario->setPassword($password);

$usuario->actualizar();

// REDIRECCION

header('Location: ../listado.php?mensaje=2');

?>

