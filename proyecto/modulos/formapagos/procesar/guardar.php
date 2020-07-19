<?php

require_once "../../../class/FormaPago.php";

$descripcion = $_POST['txtDescripcion'];

$formaPago = new FormaPago($descripcion);

$formaPago->guardar();

?>