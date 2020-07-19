<?php

require_once "../../../class/Rubro.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];

$rubro = Rubro::obtenerPorId($id);
$rubro->setNombre($nombre);

$rubro->actualizar();

?>