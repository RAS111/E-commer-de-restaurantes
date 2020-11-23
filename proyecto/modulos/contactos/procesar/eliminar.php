<?php
require_once "../../../class/Contacto.php";

$id = $_GET['id'];

$modulo = $_GET['modulo'];
$idLlamada = $_GET['idLlamada'];

$contacto = Contacto::obtenerPorId($id);

$contacto->eliminar();


header("location: /E-commerce-de-restaurantes/proyecto/modulos/$modulo/detalle.php?id=$idLlamada");
?>
