<?php

require_once '../../../class/Perfil.php';
require_once '../../../class/PerfilModulo.php';

session_start();

$descripcion = $_POST['txtDescripcion'];
$listaModulos = $_POST['cboModulos'];

//VALIDACIONES
if(empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "La descripción no debe estar vacio";
	header("Location: ../alta.php");
	exit;
} elseif (strlen(trim($descripcion)) < 3) {
	$_SESSION['mensaje_error'] = "La descripción debe contener al menos 3 caracteres";
	header("Location: ../alta.php");
	exit;
}

if ((int) $listaModulos == 0) {
	$_SESSION['mensaje_error'] = "Debe seleccionar el modulo";
	header("location: ../alta.php");
	exit;
}

//GUARDAR
$perfil = new Perfil($descripcion);
$perfil->guardar();

foreach ($listaModulos as $modulo_id) {
	$perfilModulo = new PerfilModulo();
	$perfilModulo->setIdPerfil($perfil->getIdPerfil());
	$perfilModulo->setIdModulo($modulo_id);
	$perfilModulo->guardar();
}

//REDIRECCION
header('Location: ../listado.php?mensaje=1');

?>