<?php

require_once 'Modulo.php';

$descripcion = $_POST['txtDescripcion'];
$directorio = $_POST['txtDirectorio'];

$modulo = new Modulo($descripcion, $directorio);

$modulo->guardar();

header("location:");

?>