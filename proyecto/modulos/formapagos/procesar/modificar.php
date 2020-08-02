<?php

require_once "../../../class/FormaPago.php";

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];

$formaPago = FormaPago::obtenerPorId($id);
$formaPago->setDescripcion($descripcion);

$formaPago->actualizar();

header("Location:../listado.php?mensaje=2");

?>