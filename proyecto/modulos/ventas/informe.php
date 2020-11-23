<?php

require_once "../../class/MySQL.php";

if (isset($_GET['txtFechaDesde'])) {
    $fechaDesde = $_GET['txtFechaDesde'];
}

if (isset($_GET['txtFechaHasta'])) {
    $fechaHasta = $_GET['txtFechaHasta'];
}

$datos = NULL;

if (isset($fechaDesde) && isset($fechaHasta)) {
    if (!empty($fechaDesde) && !empty($fechaHasta)) {
        $sql = "SELECT factura.fecha, factura.numero, factura.tipo, "
            . "SUM(dp.cantidad * dp.precio) as total "
            . "FROM factura "
            . "INNER JOIN detallepedido as dp ON dp.id_pedido = factura.id_pedido "
            . "WHERE factura.fecha BETWEEN '$fechaDesde' AND '$fechaHasta' "
            . "GROUP BY factura.id_factura";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
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
                            <h4 class="text-black h4">Informe Por Fechas</h4>
                        </div>
                        <form lass="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method='GET'>
                            <section>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-30">
                                        <div class="btn-list">
                                            <a href="informe_mes.php"><input type="button" class="btn btn-info" value="Informe Por Mes"></a>
                                            <a href="informe_cliente.php"><input type="button"class="btn btn-info" value="Informe Por Cliente"></a>
                                        </div>  
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fecha Desde</label>
                                            <input type='date' name='txtFechaDesde' class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fecha Hasta</label>  
                                            <input type='date' name='txtFechaHasta' class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <input type='submit' value='Consultar' class="btn btn-info">
                        </form>
                        <br>
                        <?php if (!is_null($datos)): ?>
                            <table class="table table-striped">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Factura Numero</th>
                                    <th>Tipo de Factura</th>
                                    <th>Total</th>
                                </tr>
                                <?php while($row = $datos->fetch_assoc()): ?>
                                    <tr>
                                    <td><?php echo $row['fecha'] ?></td>
                                    <td><?php echo $row['numero'] ?></td>
                                    <td><?php echo $row['tipo'] ?></td>
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