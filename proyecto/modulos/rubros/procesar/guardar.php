<?php

require_once "../../../class/Rubro.php";

$nombre = $_POST['txtNombre'];

$rubro = new Rubro($nombre);

$rubro->guardar();

?>