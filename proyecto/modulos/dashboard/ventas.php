<?php

require_once "../../class/MySQL.php";

    $sql = "SELECT MONTHNAME(factura.fecha) AS mes, SUM(dp.cantidad * dp.precio) AS total ".
            "FROM factura ".
            "INNER JOIN detallepedido AS dp ON dp.id_pedido = factura.id_pedido ".
            "GROUP BY mes ".
            "ORDER BY mes DESC";

    $mysql = new MySQL();
    $datos = $mysql->consultar($sql);


?>

    
    <div class="col-xl-8 mb-30">
        <div class="card-box height-100-p pd-20">
           <h2 class="h4 pd-20">Total de Ventas</h2>
            <canvas id="myChart" height="200"></canvas>
        </div>
    </div>


<script src="../../static/static/plugins/chart.js/Chart.min.js"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');

var labels_db = [];
var data_db = [];
var colores =[];

<?php while($row = $datos->fetch_assoc()): ?>

    labels_db.push('<?=$row["mes"];?>');
    data_db.push('<?=$row["total"];?>');
    colores.push(colorRGB());
<?php endwhile ?>

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels_db,
        datasets: [{
            label: 'Total Ventas',
            data: data_db,
            backgroundColor: colores,
            borderColor: colores,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

function generarNumero(numero){
    return (Math.random()*numero).toFixed(0);
}

function colorRGB(){
    var color = "("+generarNumero(255)+"," + generarNumero(255) + "," + generarNumero(255) +")";
    return "rgb" + color;
}
</script>
