<?php

require_once '../../../class/RecetaProducto.php';

session_start();
$idMenu = $_POST['txtId'];
$idMenuVer = $_POST['txtIdMenuVer'];
$cantidad = $_POST['txtCantidad'];
$producto = $_POST['cboProducto'];

// VALIDACIONES
if (empty(trim($cantidad))) {
	$_SESSION['mensaje_error'] = "La cantidad no debe estar vacio";
	header('Location: ../alta.php?id=$idMenu');
	exit;
}

if ((int) $producto == 0) {
	$_SESSION['mensaje_error'] = "Debe seleccionar un producto";
	header("location: ../alta.php?id=$idMenu");
	exit;
}

$recetaProducto = new RecetaProducto();
$recetaProducto->setCantidad($cantidad);
$recetaProducto->setIdProducto($producto);
$recetaProducto->setIdMenu($idMenu);
$recetaProducto->guardar();


//highlight_string(var_export($perfil, true));

header("Location: ../listado.php?id=$idMenu");

?>