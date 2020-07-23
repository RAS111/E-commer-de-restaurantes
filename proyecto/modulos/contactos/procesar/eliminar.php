<?php
require_once "../../../class/Contacto.php";

$id = $_GET['id'];

$contacto = Contacto::obtenerPorId($id);

$contacto->eliminar();

header("Location:../../clientes/listado.php");

?>
