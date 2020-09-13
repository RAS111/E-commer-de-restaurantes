<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Font & Icon -->
  <link rel="stylesheet" href="static/static/font/inter/inter.min.css">
  <link href="static/static/plugins/material-design-icons-iconfont/material-design-icons.min.css" rel="stylesheet">
  <!-- Plugins -->
  <!-- CSS plugins goes here -->
  <!-- Main Style -->
  <link rel="stylesheet" href="static/static/plugins/simplebar/simplebar.min.css">
  <link rel="stylesheet" href="static/static/css/style.min.css" id="main-css">
  <link rel="stylesheet" href="static/static/css/sidebar-gray.min.css" id="theme-css"> <!-- options: blue,cyan,dark,gray,green,pink,purple,red,royal,ash,crimson,namn,frost -->
  <title>Iniciar Sesion</title>
</head>

<body class="login-page">

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-7 col-xl-8 d-none d-lg-block">
        <img src="static/static/img/auth.svg" alt="" class="img-fluid w-100">
      </div>
      <div class="col-lg-5 col-xl-4 d-flex justify-content-center align-items-start">
        <div class="card mb-3">
          <div class="card-body p-4">
            <h3>Inicia Sesión</h3>
            <p class="font-weight-light text-secondary">En tu cuenta</p>
            <hr>
            <form action="modulos/usuarios/procesar/login.php" method="POST">
              <div class="form-group">
                <label class="font-size-sm" for="txtUsuario">Nombre de usuario</label>
                <input type="text" name="txtUsuario" class="form-control bg-gray-200 border-gray-200" id="txtUsuario" placeholder="Ingrese el nombre de usuario" autocomplete="off">
              </div>
              <div class="form-group">
                <label class="font-size-sm" for="txtPassword">Contraseña</label>
                <input type="password" name="txtPassword" class="form-control bg-gray-200 border-gray-200" id="txtPassword" placeholder="Ingrese su contraseña">
              </div>
              
              <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Plugins -->
  <!-- JS plugins goes here -->

</body>

</html>