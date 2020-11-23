<?php

require_once "../../class/MySQL.php";

    $sql = "SELECT motivo, COUNT(motivo) AS cantidad
            FROM notadecredito 
            GROUP BY motivo";

    $mysql = new MySQL();
    $datos = $mysql->consultar($sql);


?>

    <div class="col-xl-4 mb-30">
        <div class="card-box height-100-p pd-20">
            <h2 class="h4 pd-20">Nota de credito</h2>
            <canvas id="oilChart" height="500"></canvas>
        </div>
    </div>
   



<script src="../../static/static/plugins/chart.js/Chart.min.js"></script>
<script>
var oilCanvas = document.getElementById("oilChart");

var labels_db = [];
var data_db = [];
var colores =[];

<?php while($row = $datos->fetch_assoc()): ?>

    labels_db.push('<?=$row["motivo"];?>');
    data_db.push('<?=$row["cantidad"];?>');
    colores.push(colorRGB());

<?php endwhile ?>

Chart.defaults.global.defaultFontSize = 10;

var oilData = {
    labels: labels_db,
    datasets: [
        {
            data: data_db,
            backgroundColor: colores
            
        }]
};

var pieChart = new Chart(oilCanvas, {
  type: 'pie',
  data: oilData
});
function generarNumero(numero){
    return (Math.random()*numero).toFixed(0);
}

function colorRGB(){
    var color = "("+generarNumero(255)+"," + generarNumero(255) + "," + generarNumero(255) +")";
    return "rgb" + color;
}
</script>
