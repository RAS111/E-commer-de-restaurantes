<?php

require_once '../../../class/Perfil.php';
require_once '../../../class/PerfilModulo.php';

session_start();

$idPerfil = $_POST['txtIdPerfil'];
$descripcion = $_POST['txtDescripcion'];
$listaModulos = $_POST['cboModulos'];

//VALIDACIONES
if(empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "La descripción no debe estar vacio";
	header("Location: ../modificar.php?id=$id");
	exit;
} elseif (strlen(trim($descripcion)) < 3) {
	$_SESSION['mensaje_error'] = "La descripción debe contener al menos 3 caracteres";
	header("Location: ../modificar.php?id=$id");
	exit;
}

if ((int) $listaModulos == 0) {
	$_SESSION['mensaje_error'] = "Debe seleccionar el modulo";
	header("Location: ../modificar.php?id=$id");
	exit;
}

//ACTUALIZAR
$perfil = Perfil::obtenerPorId($idPerfil);
$perfil->setDescripcion($descripcion);
$perfil->actualizar();

$perfil->eliminarModulos();

foreach ($listaModulos as $modulo_id) {
	$perfilModulo = new PerfilModulo();
	$perfilModulo->setIdPerfil($perfil->getIdPerfil());
	$perfilModulo->setIdModulo($modulo_id);
	$perfilModulo->guardar();
}

//REDIRECCION
header('Location: ../listado.php?mensaje=2');

?>

