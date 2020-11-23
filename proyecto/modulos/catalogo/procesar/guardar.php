<?php

require_once "../../../class/Imagen.php";

$idItem = $_POST['txtIdItem'];
$idLlamada = $_POST['txtIdLlamada'];
$modulo = $_POST['txtModulo'];

$img = $_FILES['fileImagen'];


$extension = pathinfo($img['name'], PATHINFO_EXTENSION);

$nombreSinEspacios = str_replace(" ", "_", $img['name']);

$fechaHora = date("dmYHis");

$nombreImagen = $fechaHora . "_" . $nombreSinEspacios;

$rutaImagen = "../../../imagenes/" . $nombreImagen;

move_uploaded_file($img['tmp_name'], $rutaImagen);

$imagen = new Imagen();
$imagen->setImagen($nombreImagen);
$imagen->setIdItem($idItem);

$imagen->guardar();
highlight_string(var_export($imagen,true));
exit;

header("location: /E-commerce-de-restaurantes/proyecto/modulos/$modulo/detalle.php?id=$idLlamada");

?>