<?php
    require_once "../../class/MySQL.php";

if (isset($_GET['cboProducto'])) {
    $producto = $_GET['cboProducto'];
}



$datos = NULL;

if (isset($producto)) {
    if (!empty($producto)) {
        if ($producto == 1) {
            $sql = "SELECT * FROM producto
                    INNER JOIN item ON item.id_item = producto.id_item
                    WHERE stock_actual <= stock_minimo
                    ORDER BY producto.stock_actual DESC";

            $mysql = new MySQL();
            $datos = $mysql->consultar($sql);
        }elseif($producto == 2){
            $sql = "SELECT * FROM producto
                    INNER JOIN item ON item.id_item = producto.id_item
                    ORDER BY producto.stock_actual DESC";

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
                            <h4 class="text-black h4">Control de Stock</h4>
                        </div>
                        <form lass="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method='GET'>
                            <section>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="cboProducto" class="custom-select form-control" id="cboProducto">
                                            <option value="0">Seleccionar</option>     
                                            <option value="1">Productos con Stock Minimo</option>
                                            <option value="2">Todos los Productos</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type='submit' value='Consultar' class="btn btn-info">
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <br>
                        
                           
                       
                        <?php if (!is_null($datos)): ?>
                            <?php if ($producto == 1): ?>
                                <div class="clearfix">
                                    <h4 class="text-black h5">Productos con Stock Minimo</h4>
                                </div>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Stock Minimo</th>
                                        <th>Stock Actual</th>
                                       
                                    </tr>
                                    <?php while($row = $datos->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo $row['nombre'] ?></td>
                                            <td><?php echo $row['stock_minimo'] ?></td>
                                            <td><?php echo $row['stock_actual'] ?></td>
                                        </tr>
                                    <?php endwhile ?>
                                </table>
                            <?php elseif ($producto == 2): ?>
                                <div class="clearfix">
                                    <h4 class="text-black h5"> Todos los productos</h4>
                                </div>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Stock Minimo</th>
                                        <th>Stock Actual</th>
                                       
                                    </tr>
                                    <?php while($row = $datos->fetch_assoc()): ?>
                                        <tr>
                                        <?php if ($row['stock_actual'] <= $row['stock_minimo']): ?>
                                            <td class="table-danger"><?php echo $row['nombre'] ?></td>
                                            <td class="table-danger"><?php echo $row['stock_minimo'] ?></td>
                                            <td class="table-danger"><?php echo $row['stock_actual'] ?></td>
                                        <?php else:?>
                                            <td><?php echo $row['nombre'] ?></td>
                                            <td><?php echo $row['stock_minimo'] ?></td>
                                            <td><?php echo $row['stock_actual'] ?></td>
                                         <?php endif ?>
                                        </tr>
                                    <?php endwhile ?>
                                </table>
                            <?php endif ?>           
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('../../file_js.php');?>
</body>
</html>