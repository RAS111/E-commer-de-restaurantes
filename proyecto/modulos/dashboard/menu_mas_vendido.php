<?php

	require_once "../../class/MySQL.php";

    $sql = "SELECT i.nombre, SUM(dp.cantidad) AS cantidad 
			FROM factura
			INNER JOIN detallepedido AS dp ON dp.id_pedido = factura.id_pedido
			INNER JOIN item AS i ON i.id_item = dp.id_item
			INNER JOIN menu AS m ON m.id_item = i.id_item
			ORDER BY cantidad DESC";

    $mysql = new MySQL();
    $datos = $mysql->consultar($sql);



?>



	<div class="col-xl-3 mb-30">
	    <div class="card-box height-100-p widget-style1">
	        <div class="d-flex flex-wrap align-items-center">
	            <div class="progress-data">
	                <div id="chart3"></div>
	            </div>
	            <div class="widget-data">
	                <?php while($row = $datos->fetch_assoc()): ?>
	                    <div class="h4 mb-0"><?php echo $row['nombre'] ?></div>
	                    <div class="weight-600 font-14">Menu</div>
	                <?php endwhile ?>
	            </div>
	        </div>
	    </div>
	</div>
