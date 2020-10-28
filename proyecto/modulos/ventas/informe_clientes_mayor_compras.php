<?php

require_once "../../class/MySQL.php";

if (isset($_GET['txtFechaDesde'])) {
    $fechaDesde = $_GET['txtFechaDesde'];
}

if (isset($_GET['txtFechaHasta'])) {
    $fechaHasta = $_GET['txtFechaHasta'];
}

if (isset($_GET['cboMes'])) {
    $mes = $_GET['cboMes'];
}


$datos = NULL;

if (isset($mes) || isset($fechaDesde) && isset($fechaHasta)) {
    if (!empty($mes) || !empty($fechaDesde) && !empty($fechaHasta)) {
            $sql = "SELECT factura.fecha, factura.numero, factura.tipo, persona.nombre,persona.apellido, SUM(dp.cantidad * dp.precio) AS total 
                FROM factura
                INNER JOIN detallepedido AS dp ON dp.id_pedido = factura.id_pedido
                INNER JOIN pedidoss AS p ON p.id_pedido = factura.id_pedido
                INNER JOIN cliente ON p.id_cliente = cliente.id_cliente
                INNER JOIN persona ON persona.id_persona = cliente.id_persona
                WHERE MONTH(factura.fecha) = '$mes' OR factura.fecha BETWEEN '$fechaDesde' AND '$fechaHasta'
                GROUP BY persona.nombre
                ORDER BY total DESC LIMIT 3";

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
                            <h4 class="text-black h4">Informe de Clientes que más Compraron</h4>
                        </div>
                        <form lass="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method='GET'>
                            <section>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-30">
                                        <div class="btn-list">
                                            <a href="informe_mes.php"><input type="button" class="btn btn-info" value="Informe Por Mes"></a>
                                            <a href="informe_cliente.php"><input type="button" class="btn btn-info" value="Informe Por Cliente"></a>
                                        </div>  
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Fecha Desde</label>
                                            <input type='date' name='txtFechaDesde' class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
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
                                    
                                    <th>Nombre</th>
                                   
                                    <th>Total</th>
                                </tr>
                                <?php while($row = $datos->fetch_assoc()): ?>
                                    <tr>
                                    
                                    <td><?php echo $row['nombre']," ", $row['apellido']  ?></td>
                                    
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