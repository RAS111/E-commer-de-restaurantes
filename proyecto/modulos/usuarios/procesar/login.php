<?php

require_once "../../../class/Usuario.php";


$username = $_POST['txtUsuario'];
$password = $_POST['txtPassword'];


$usuario = Usuario::login($username, $password);

//highlight_string(var_export($usuario, true));
//exit;

if ($usuario->estaLogueado()) {
	session_start();
	$_SESSION['usuario'] = $usuario;
	header("location:/E-commerce-de-restaurantes/proyecto/modulos/dashboard/dashboard.php");
} else {
	header("location:E-commerce-de-restaurantes/proyecto/formulario_login.php");
}

?>