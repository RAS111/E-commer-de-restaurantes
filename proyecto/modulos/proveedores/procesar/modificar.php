<?php

require_once "../../../class/Proveedor.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$sexo = $_POST['txtSexo'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];
$razonSocial = $_POST['txtRazonSocial'];
$cuil = $_POST['txtCuil'];


if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}


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

header('Location: ../listado.php?mensaje=2');

?>

