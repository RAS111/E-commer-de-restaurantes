<?php
require_once '../../../class/RecetaProducto.php';

$id = $_GET['id'];
$idMenu = $_GET['idMenu'];

$RecetaProducto = RecetaProducto::obtenerPorId($id);
$RecetaProducto->eliminar();

header("location: ../listado.php?id=$idMenu");
?>