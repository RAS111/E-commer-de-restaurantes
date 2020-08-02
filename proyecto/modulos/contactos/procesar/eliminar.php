<?php
require_once "../../../class/Contacto.php";

$id = $_GET['id'];
$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];

$contacto = Contacto::obtenerPorId($id);

$contacto->eliminar();


header("location: /E-commerce-de-restaurantes/proyecto/modulos/clientes/detalle.php?id=$idLlamada");
?>
