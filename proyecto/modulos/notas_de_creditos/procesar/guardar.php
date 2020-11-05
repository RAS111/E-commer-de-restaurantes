<?php

require_once "../../../class/NotaDeCredito.php";

$fecha = $_POST['txtFecha'];
$usuario = $_POST['cboUsuario'];
$motivo = $_POST['cboMotivo'];
$observacion = $_POST['txtObservacion'];
$idFactura = $_POST['txtIdFactura'];

$notaDeCredito = new NotaDeCredito();
$notaDeCredito->setFecha($fecha);
$notaDeCredito->setIdUsuario($usuario);
$notaDeCredito->setMotivo($motivo);
$notaDeCredito->setObservacion($observacion);
$notaDeCredito->setIdFactura($idFactura);

$notaDeCredito->guardar();

//highlight_string(var_export($notaDeCredito,true));
//exit;

header('Location: ../listado.php?mensaje=1');
?>