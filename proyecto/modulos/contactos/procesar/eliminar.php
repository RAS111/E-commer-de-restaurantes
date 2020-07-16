<?php

require_once "../../../class/Contacto.php";

$id = $_POST['txtId'];

$contacto = Contacto::obtenerPorId($id);

$contacto->eliminar();


?>
