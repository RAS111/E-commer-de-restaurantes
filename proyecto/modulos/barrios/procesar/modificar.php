<?php

require_once "../../../class/Barrio.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];

$barrio = Barrio::obtenerPorId($id);
$barrio->setNombre($nombre);

$barrio->actualizar();

?>