<?php

require_once "../../../class/MySQL.php";
require_once "../../../class/Producto.php";	

    $rubro = $_POST['cboRubro'];


    $porcentaje = $_POST['txtPorcentaje'];

	$sql = "UPDATE item ".
		   "INNER JOIN producto ON producto.id_item = item.id_item ".
		   "set precio = precio + (precio * $porentaje / 100) WHERE id_rubro = $rubro";

	$mysql = new MySQL();
	$datos = $mysql->consultar($sql); 


?>