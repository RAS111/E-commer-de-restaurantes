<?php
require_once "../../../class/Modulo.php";

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];
$directorio = $_POST['txtDirectorio'];

$modulo = Modulo::obtenerPorId($id);
$modulo->setDescripcion($descripcion);
$modulo->setDirectorio($directorio);


$modulo->actualizar();


header("location:../listado.php");

?>