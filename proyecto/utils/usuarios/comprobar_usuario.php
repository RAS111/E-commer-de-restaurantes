<?php 
require_once "../../class/Persona.php";
require_once "../../class/MySQL.php";
require_once "../../class/Usuario.php";

 
function comprobarUsuario($username){
	$sql = " SELECT * FROM usuario WHERE username = $username";

	$mysql = new MySQL();
    $result = $mysql->consultar($sql);
    $mysql->desconectar();

    if ($result->num_rows > 0) {
    	echo "Usuario no disponible";
    	exit;
    } else {
    	echo "Usuario disponible";
    }
}


?>