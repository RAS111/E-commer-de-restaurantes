<?php

require_once "../../../class/Rubro.php";

session_start();

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];

//VALIDACIONES
if(empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "El nombre no debe estar vacio";
	header('Location: ../modificar.php?id=$id');
	exit;
} elseif (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "El nombre debe contener al menos 3 caracteres";
	header('Location: ../modificar.php?id=$id');
	exit;
}

//ACTUALIZAR
$rubro = Rubro::obtenerPorId($id);
$rubro->setNombre($nombre);

$rubro->actualizar();

//REDIRECCION
header("Location: ../listado.php?mensaje=2");

?>