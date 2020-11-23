<?php

require_once "../../../class/Barrio.php";

session_start();

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];

//VALIDACIONES
if(empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "El nombre no debe estar vacio";
	header("Location: ../modificar.php?id=$id");
	exit;
} elseif (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "El nombre debe contener al menos 3 caracteres";
	header("Location: ../modificar.php?id=$id");
	exit;
}

//ACTUALIAR
$barrio = Barrio::obtenerPorId($id);
$barrio->setNombre($nombre);

$barrio->actualizar();

//REDIRECCION
header("Location:../listado.php?mensaje=2");
?>