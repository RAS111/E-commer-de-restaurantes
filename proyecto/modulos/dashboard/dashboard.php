

<!DOCTYPE html>
<html>

    <!--Head-->
    <?php include_once('../../head.php'); ?>

<body>
  
    <!--MENU-->
    <?php include_once('../../menu.php'); ?>

    <!--HEADER-->
    <?php require_once "../../header.php"; ?>

    <!-- /Sidebar  -->
    <?php require_once "../../sidebar.php"; ?>
    <!-- /Sidebar -->

    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="row">
                <?php require_once "total_ventas.php"; ?>
                <?php require_once "total_compras.php"; ?>
                <?php require_once "menu_mas_vendido.php"; ?>
                <?php require_once "producto_mas_vendido.php"; ?>
            </div>
            <div class="row">
                <?php require_once "ventas.php"; ?>
                <?php require_once "nota_de_credito.php"; ?>
            </div>
            <div class="card-box mb-30">
                <h2 class="h4 pd-20">Más vendidos</h2>
                <?php require_once "mas_vendidos.php"; ?>
            </div>
        </div>
    </div>
<!-- js -->
<script src="../../static/vendors/scripts/core.js"></script>
<script src="../../static/vendors/scripts/script.min.js"></script>
<script src="../../static/vendors/scripts/process.js"></script>
<script src="../../static/vendors/scripts/layout-settings.js"></script>
<script src="../../static/src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="../../static/vendors/scripts/dashboard.js"></script>

</body>
</html>