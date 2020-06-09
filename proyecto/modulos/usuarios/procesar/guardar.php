<?php

require_once "../../../class/Usuario.php";

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$sexo = $_POST['txtSexo'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];
$username = $_POST['txtNombreUsuario'];
$password = $_POST['txtContraseña'];


if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}


$usuario = new Usuario($nombre, $apellido);
$usuario->setSexo($sexo)
$usuario->setFechaNacimiento($fechaNacimiento);
$usuario->setIdTipoDocumento($tipoDocumento);
$usuario->setNumeroDocumento($numeroDocumento);
$usuario->setUsername($username);
$usuario->setPassword($password);

$usuario->guardar();

header('Location: ../listado.php?mensaje=1');

?>