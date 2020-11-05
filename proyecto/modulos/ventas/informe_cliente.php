<?php

require_once "../../class/MySQL.php";
require_once "../../class/Cliente.php";

$listadoCliente = Cliente::obtenerTodos();

if (isset($_GET['cboCliente'])) {
    $cliente = $_GET['cboCliente'];
}



$datos = NULL;

if (isset($cliente) ) {
    if (!empty($cliente) ) {
        $sql = "SELECT persona.nombre,persona.apellido, factura.numero, factura.tipo, "
            . "SUM(dp.cantidad * dp.precio) as total "
            . "FROM factura "
            . "INNER JOIN detallepedido as dp ON dp.id_pedido = factura.id_pedido "
            . "INNER JOIN pedidoss AS p ON p.id_pedido = factura.id_pedido "
            . "INNER JOIN cliente ON p.id_cliente = cliente.id_cliente "
            . "INNER JOIN persona ON persona.id_persona = cliente.id_persona "
            . "WHERE p.id_cliente = '$cliente' "
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
                            <h4 class="text-black h4">Informe Por Cliente</h4>
                        </div>
                        <form lass="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method='GET'>
                            <section>
                                 <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-30">
                                        <div class="btn-list">
                                            <a href="informe.php"><input type="button" class="btn btn-info" value="Informe Por Fecha"></a>
                                            <a href="informe_mes.php"><input type="button"class="btn btn-info" value="Informe Por Mes"></a>
                                        </div>  
                                    </div>  
                                </div>
                            
                                <div class="row">
                                   <div class="col-md-4" >
                                        <div class="form-group ">
                                            <select name="cboCliente" id="cboCliente"  class="custom-select2 form-control">
                                                <option value="0">Seleccionar Cliente</option>
                                                <?php foreach ($listadoCliente as $cliente): ?>

                                                    <option value="<?php echo $cliente->getIdCliente(); ?>">
                                                        <?php echo $cliente; ?>
                                                    </option>

                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type='submit' value='Consultar' class="btn btn-info">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            
                        </form>
                        <br>
                        <?php if (!is_null($datos)): ?>
                            <table class="table table-striped">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Factura Numero</th>
                                    <th>Tipo de Factura</th>
                                    <th>Total</th>
                                </tr>
                                <?php while($row = $datos->fetch_assoc()): ?>
                                    <tr>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?=$row['apellido']?></td>
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