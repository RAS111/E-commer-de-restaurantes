<?php

require_once "../../../class/Barrio.php";

$nombre = $_POST['txtNombre'];

$barrio = new Barrio($nombre);

$barrio->guardar();

?>