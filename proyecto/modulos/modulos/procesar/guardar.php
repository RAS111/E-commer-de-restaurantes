<?php

require_once "../../../class/Modulo.php";

$descripcion = $_POST['txtDescripcion'];
$directorio = $_POST['txtDirectorio'];

$modulo = new Modulo($descripcion, $directorio);

$modulo->guardar();

header("location:../listado.php");

?>