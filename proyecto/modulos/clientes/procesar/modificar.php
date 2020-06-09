<?php

require_once "../../../class/Cliente.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$sexo = $_POST['txtSexo'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];



if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}


//$cliente = new Cliente($nombre, $apellido);
$cliente = Cliente::obtenerPorId($id);
$cliente->setNombre($nombre);
$cliente->setApellido($apellido);
$cliente->setSexo($sexo);
$cliente->setFechaNacimiento($fechaNacimiento);
$cliente->setIdTipoDocumento($tipoDocumento);
$cliente->setNumeroDocumento($numeroDocumento);


$cliente->actualizar();

header('Location: ../listado.php?mensaje=2');

?>
