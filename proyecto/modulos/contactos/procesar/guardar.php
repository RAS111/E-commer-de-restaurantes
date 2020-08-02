<?php

require_once "../../../class/Contacto.php";

session_start();

$idPersona = $_POST['txtIdPersona'];
$idLlamada = $_POST['txtIdLlamada'];
$modulo = $_POST['txtModulo'];
$valor = $_POST['txtValor'];
$idTipoContacto = $_POST['cboTipoContacto'];


// VALIDACIONES


// GUARDAR Contacto

$contacto = new Contacto();
$contacto->setValor($valor);
$contacto->setIdTipoContacto($idTipoContacto);
$contacto->setIdPersona($idPersona);


$contacto->guardar();


// REDIRECCIONAR

header("location: /E-commerce-de-restaurantes/proyecto/modulos/$modulo/detalle.php?id=$idLlamada");


?>
