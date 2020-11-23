<?php

	require_once "../../class/MySQL.php";

    $sql = "SELECT SUM(dc.cantidad * dc.precio) AS total ".
            "FROM compra ".
            "INNER JOIN detallecompra AS dc ON dc.id_compra = compra.id_compra";

    $mysql = new MySQL();
    $datos = $mysql->consultar($sql);



?>



	<div class="col-xl-3 mb-30">
	    <div class="card-box height-100-p widget-style1">
	        <div class="d-flex flex-wrap align-items-center">
	            <div class="progress-data">
	                <div id="chart2"></div>
	            </div>
	            <div class="widget-data">
	                <?php while($row = $datos->fetch_assoc()): ?>
	                    <div class="h4 mb-0">$<?php echo $row['total'] ?></div>
	                    <div class="weight-600 font-14">Total Compras</div>
	                <?php endwhile ?>
	            </div>
	        </div>
	    </div>
	</div>

