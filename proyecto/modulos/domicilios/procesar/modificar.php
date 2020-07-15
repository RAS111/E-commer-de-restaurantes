<?php

require_once "../../../class/Domicilio.php";

session_start();

$idPersona = $_POST['txtIdPersona'];
$idDomicilio = $_POST['txtIdDomicilio'];
$idCliente = $_POST['txtIdCliente'];
$calle = $_POST['txtCalle'];
$altura = $_POST['txtAltura'];
$barrio = $_POST['cboBarrio'];
$manzana = $_POST['txtManzana'];
$casa = $_POST['txtCasa'];
$piso = $_POST['txtPiso'];
$departamento = $_POST['txtDepartamento'];
$torre = $_POST['txtTorre'];
$sector = $_POST['txtSector'];

// VALIDACIONES

/*if (empty(trim($altura))) {
	$_SESSION['mensaje_error'] = "el numero de altura no debe estar vacio";
	header('Location: ../alta.php');
	exit;
}

if (empty(trim($calle))) {
	$_SESSION['mensaje_error'] = "el nombre de la calle no debe estar vacio";
	header('Location: ../alta.php');
	exit;
} elseif (strlen(trim($calle)) < 4) {
	$_SESSION['mensaje_error'] = "el nombre de la calle debe contener al menos 4 caracteres";
	header('Location: ../alta.php');
	exit;
}

if (empty(trim($casa))) {
	$_SESSION['mensaje_error'] = "el numero de la casa no debe estar vacia";
	header('Location: ../alta.php');
	exit;
}

if ((int) $barrio == 0) {
	$_SESSION['mensaje_error'] = "debe seleccionar el barrio";
	header("location: ../alta.php");
	exit;
}*/

// MODIFICAR DOMICILIO

$domicilio = Domicilio::obtenerPorIdPersona($idPersona);
$domicilio->setCalle($calle);
$domicilio->setAltura($altura);
$domicilio->setIdBarrio($barrio);
$domicilio->setManzana($manzana);
$domicilio->setCasa($casa);
$domicilio->setPiso($piso);
$domicilio->setDepartamento($departamento);
$domicilio->setTorre($torre);
$domicilio->setSector($sector);


$domicilio->actualizar($idDomicilio);

// redireccionar



header("location: /E-commerce-de-restaurantes/proyecto/modulos/clientes/detalle.php?id=$idCliente");


?>
