<?php

session_start();
session_destroy();

header('location: /E-commerce-de-restaurantes/proyecto/formulario_login.php');

?>