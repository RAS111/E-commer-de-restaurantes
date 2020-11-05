<?php

require_once "../../class/MySQL.php";

if (isset($_GET['cboItem'])) {
    $item = $_GET['cboItem'];
}

if (isset($_GET['cboMes'])) {
    $mes = $_GET['cboMes'];
}


$datos = NULL;

if (isset($mes) && isset($item)){
    if (!empty($mes) && !empty($item)) {
        
        if ($item == 2) {
           $sql = "SELECT i.nombre, SUM(dp.cantidad) AS cantidad, SUM(dp.cantidad * dp.precio) AS total 
                    FROM factura
                    INNER JOIN detallepedido AS dp ON dp.id_pedido = factura.id_pedido
                    INNER JOIN item AS i ON i.id_item = dp.id_item
                    INNER JOIN menu AS m ON m.id_item = i.id_item
                    WHERE MONTH(factura.fecha) = '$mes'
                    GROUP BY i.nombre
                    ORDER BY cantidad DESC LIMIT 5";

            $mysql = new MySQL();
            $datos = $mysql->consultar($sql);
            
        }elseif ($item == 3) {
            $sql = "SELECT i.nombre, SUM(dp.cantidad) AS cantidad, SUM(dp.cantidad * dp.precio) AS total 
                    FROM factura
                    INNER JOIN detallepedido AS dp ON dp.id_pedido = factura.id_pedido
                    INNER JOIN item AS i ON i.id_item = dp.id_item
                    INNER JOIN producto AS p ON p.id_item = i.id_item
                    WHERE MONTH(factura.fecha) = '$mes'
                    GROUP BY i.nombre
                    ORDER BY cantidad DESC LIMIT 5";

            $mysql = new MySQL();
            $datos = $mysql->consultar($sql);
        }else {
            $sql = "SELECT i.nombre, SUM(dp.cantidad) AS cantidad, SUM(dp.cantidad * dp.precio) AS total
            FROM factura
            INNER JOIN detallepedido AS dp ON dp.id_pedido = factura.id_pedido
            INNER JOIN item AS i ON i.id_item = dp.id_item
            WHERE MONTH(factura.fecha) = $mes
            GROUP BY i.nombre
            ORDER BY cantidad DESC LIMIT 10";
        
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        }
        
    }
   
}
?>

<!DOCTYPE html>
<html>
    <?php include_once('../../head.php'); ?>
<body>
    <?php require_once '../../menu.php';?>
    <?php require_once "../../header.php"; ?>
    <?php require_once "../../sidebar.php"; ?>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                    <div class="wizard-content">
                        <div class="clearfix">
                            <h4 class="text-black h4">Consultar Menu o Productos más Vendidos</h4>
                        </div>
                        <form lass="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method='GET'>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mes</label>
                                            <select name="cboMes" class="custom-select form-control" id="cboTipoFactura">
                                            <option value="0">Seleccionar</option>     
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Menu y Bebidas</label>
                                        <select name="cboItem" class="custom-select form-control" id="cboItem">
                                            <option value="1">Seleccionar</option>     
                                            <option value="2">Menu</option>
                                            <option value="3">Bebidas</option>
                                        </select>
                                    </div>
                                </div>              
                            </section>
                            <input type='submit' value='Consultar' class="btn btn-info">
                        </form>
                        <br>
                        
                       
                        <?php if (!is_null($datos)): ?>
                            <?php if ($item == 2): ?>
                                <div class="clearfix">
                                    <h4 class="text-black h5">Menus más vendidos (Top 5)</h4>
                                </div>
                            <?php elseif ($item == 3): ?>
                                <div class="clearfix">
                                    <h4 class="text-black h5">Bebidas más vendidas (Top 5)</h4>
                                </div>
                            <?php else: ?>
                                <div class="clearfix">
                                    <h4 class="text-black h5">Menu y bebidas mas vendidos (Top 10)</h4>
                                </div>
                            <?php endif ?>
                            <table class="table table-striped">
                                <tr>
                                   
                                    <th>Nombre</th>
                                    <th>Cantidad Producto</th>
                                    <th>Total</th>
                                    
                                </tr>
                                <?php while($row = $datos->fetch_assoc()): ?>
                                    <tr>
                                   
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $row['cantidad'] ?></td>
                                    <td>$<?php echo $row['total'] ?></td>
                                    </tr>
                                <?php endwhile ?>
                            </table>
                        <?php endif ?>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('../../file_js.php');?>
</body>
</html>