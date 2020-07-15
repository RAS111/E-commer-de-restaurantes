<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>	Sidebar Dashboard Template </title>
	<link rel="stylesheet" type="text/css" href="static/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

</head>
<body>


    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <?php require_once "menu.php"; ?><br>
    	
      <label for="check">
      </div>
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <!--<h3>Coding <span>Snow</span></h3>-->

      </div>
      <div class="right_area">
        <!--<a href="#" class="logout_btn">Logout</a>-->

      </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
      <a href="#"><i class="fas fa-cogs"></i><span>Componentes</span></a>
      <a href="#"><i class="fas fa-wrench"></i><span>Utilidades</span></a>
      <a href="#"><i class="fas fa-chart-area"></i><span>Graficos</span></a>
      <a href="#"><i class="fas fa-table"></i><span>Tablas</span></a>
      <a href="#"><i class="fas fa-info-circle"></i><span>Acerca de Nosotros</span></a>
      <a href="#"><i class="fas fa-sliders-h"></i><span>Configuraciones</span></a>
    </div>
    <!--sidebar end-->

    <div class="content">
      
    </div>


</body>
</html>