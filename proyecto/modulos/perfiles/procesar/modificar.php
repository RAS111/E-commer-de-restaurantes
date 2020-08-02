<?php

require_once '../../../class/Perfil.php';
require_once '../../../class/PerfilModulo.php';

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];
$listaModulos = $_POST['cboModulos'];

//$perfil = new Perfil($descripcion);
$perfil = Perfil::obtenerPorId($id);
$perfil->setDescripcion($descripcion);
$perfil->actualizar();

/* TODAVIA NO SESI ES ASI, DEJALO COMO COMENTARIO MIENTRAS
foreach ($listaModulos as $modulo_id) {
	$perfilModulo =  PerfilModulo::obtenerPorIdPerfil($id);
	$perfilModulo->setIdPerfil($perfil->getIdPerfil());
	$perfilModulo->setIdModulo($modulo_id);
	$perfilModulo->actualizar();
}

highlight_string(var_export($perfilModulo,true));
exit;
*/
//header("location:");

?>

