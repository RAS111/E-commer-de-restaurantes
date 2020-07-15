<?php

require_once 'Perfil.php';

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];

//$perfil = new Perfil($descripcion);
$perfil->obtenerPorId($id);
$perfil->setDescripcion($descripcion);
$perfil->actualizar();


//header("location:");

?>