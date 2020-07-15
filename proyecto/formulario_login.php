<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title> Login </title>

    <link rel="stylesheet" type="text/css" href="static/css/style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
</head>
<body>
    
    <h1>Login</h1>
    <div class="contenedor">
        <div class="input_contenedor">
            <form method="POST" action="modulos/usuarios/procesar/login.php">
               <!--<i class="fas fa-user icon"></i>-->
                <input type="text" name="txtUsuario" placeholder="Usuario">

                <!--<i class="fas fa-key icon"></i>-->
                <input type="password" name="txtPassword" placeholder="Contraseña">
                <input type="submit" value="Iniciar Sesion" class="button">
            </form>
        </div>
    </div >
</html>

</body>
</html>