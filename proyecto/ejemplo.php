<?php

require_once 'class/MySQL.php';
require_once 'class/Persona.php';
require_once 'class/Cliente.php';
require_once 'class/Empleado.php';
require_once 'class/Usuario.php';
require_once 'class/Proveedor.php';
require_once 'class/Contacto.php';

//$proveedor = Proveedor::obtenerPorId(1);

//highlight_string(var_export($proveedor,true));


/*$listadoCliente = Cliente::obtenerTodos();

highlight_string(var_export($listadoCliente,true));
*/
/*$empleado = new Empleado("Carla", "Martinez");
$empleado->setRazonSocial('aaaa');
$empleado->setCuil('12-3');
$empleado->setSexo('Femenino');
$empleado->setNumeroDocumento('22234');
$empleado->setFechaNacimiento('2020-06-03');
$empleado->setIdTipoDocumento('NULL');


$empleado->guardar();

highlight_string(var_export($empleado,true));*/

$cliente = Cliente::obtenerPorId(1);
$cliente->setNombre('Mario');
$cliente->setSexo('Femenino');


$cliente->Actualizar();

highlight_string(var_export($cliente,true));
?>