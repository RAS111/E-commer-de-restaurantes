<?php

require_once "../../class/MySQL.php";

    $sql = "SELECT SUM(dp.cantidad * dp.precio) AS total ".
            "FROM factura ".
            "INNER JOIN detallepedido AS dp ON dp.id_pedido = factura.id_pedido";

    $mysql = new MySQL();
    $datos = $mysql->consultar($sql);


?>


    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id="chart"></div>
                </div>
                <div class="widget-data">
                    <?php while($row = $datos->fetch_assoc()): ?>
                        <div class="h4 mb-0">$<?php echo $row['total'] ?></div>
                        <div class="weight-600 font-14">Total Ventas</div>
                    <?php endwhile ?>
                </div>
            </div>
        </div>
    </div>

