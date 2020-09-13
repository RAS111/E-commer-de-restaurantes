<?php

require_once '../../../class/RecetaProducto.php';


$idMenu = $_POST['txtId'];
$idMenuVer = $_POST['txtIdMenuVer'];
$cantidad = $_POST['txtCantidad'];
$producto = $_POST['cboProducto'];


$recetaProducto = new RecetaProducto();
$recetaProducto->setCantidad($cantidad);
$recetaProducto->setIdProducto($producto);
$recetaProducto->setIdMenu($idMenu);
$recetaProducto->guardar();


//highlight_string(var_export($perfil, true));

header("Location: ../listado.php?id=$idMenu");

?>