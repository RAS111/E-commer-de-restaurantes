<?php

require_once 'Modulo.php';

$descripcion = $_POST['txtDescripcion'];
$directorio = $_POST['txtDirectorio'];

$modulo->obtenerPorId();
$modulo->setDescripcion($descripcion);


$modulo->actualizar();

header("location:");

?>