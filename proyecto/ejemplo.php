<?php

require_once 'class/MySQL.php';
require_once 'class/Persona.php';
require_once 'class/Cliente.php';
require_once 'class/Empleado.php';
require_once 'class/Usuario.php';
require_once 'class/Proveedor.php';
require_once 'class/Contacto.php';
require_once 'class/Imagen.php';
require_once 'class/Item.php';
require_once 'class/Menu.php';
require_once 'class/Producto.php';
require_once 'class/Rubro.php';
require_once 'class/Perfil.php';
require_once 'class/Modulo.php';

$rubro = new Rubro ('Gaseosas');

$rubro->guardar();

highlight_string(var_export($rubro,true));
/*$modulo = new Modulo ("ESTADOS", "estados");

$modulo->guardar();

highlight_string(var_export($modulo,true));
*/
/*$perfil = new Perfil ("CAJA");

$perfil->guardar();

highlight_string(var_export($perfil,true));
*/
/*$item = new Item("Pepsi", 120);
$item->setRubro(1);

$item->guardar();

highlight_string(var_export($item,true));
*/

/*$cliente = new Cliente("Mariano", "Fernandez");
$cliente->setSexo('Masculino');
$cliente->setNumeroDocumento('22222');
$cliente->setFechaNacimiento('2020-06-04');
$cliente->setIdTipoDocumento(1);

$cliente->guardar();

highlight_string(var_export($cliente,true));*/

/*$cliente = Cliente::obtenerPorId(1);
$cliente->setNombre('Carlos');

$cliente->Actualizar();

highlight_string(var_export($cliente,true));*/

/*$cliente = Cliente::obtenerPorId(2);

highlight_string(var_export($cliente,true));*/


/*$listadoCliente = Cliente::obtenerTodos();

highlight_string(var_export($listadoCliente,true));
*/


/*$empleado = new Empleado("Carla", "Monigico");
$empleado->setSexo('Femenino');
$empleado->setNumeroDocumento('22234');
$empleado->setFechaNacimiento('2020-06-03');
$empleado->setIdTipoDocumento(1);

$empleado->guardar();

highlight_string(var_export($empleado,true));*/

/*$empelado = Empleado::obtenerPorId(1);
$empelado->setNombre('Martin');

$empelado->Actualizar();

highlight_string(var_export($empelado,true));*/

/*$empleado = Empleado::obtenerPorId(12);

highlight_string(var_export($empleado,true));*/


/*$listadoEmpleado = Empleado::obtenerTodos();

highlight_string(var_export($listadoEmpleado,true));
*/

/*$usuario = new Usuario("Carmen", "Hernandez");
$usuario->setUsername('carmen2');
$usuario->setPassword('1234');
$usuario->setSexo('Femenino');
$usuario->setNumeroDocumento('22233');
$usuario->setFechaNacimiento('2020-06-05');
$usuario->setIdTipoDocumento(1);

$usuario->guardar();

highlight_string(var_export($usuario,true));*/

/*$usuario = Usuario::obtenerPorId(3);
$usuario->setNombre('Maria');
$usuario->setpassword('12345');
$usuario->Actualizar();

highlight_string(var_export($usuario,true));*/

/*$usuario = Usuario::obtenerPorId(3);

highlight_string(var_export($usuario,true));*/


/*$listadoUsuario = Usuario::obtenerTodos();

highlight_string(var_export($listadoUsuario,true));*/


/*$proveedor = new Proveedor("Carlos", "Morinigo");
$proveedor->setRazonSocial('Coca-Cola');
$proveedor->setCuil('11111');
$proveedor->setSexo('Masculino');
$proveedor->setNumeroDocumento('33333');
$proveedor->setFechaNacimiento('2020-06-06');
$proveedor->setIdTipoDocumento('NULL');

$proveedor->guardar();

highlight_string(var_export($proveedor,true));*/

/*$proveedor = Proveedor::obtenerPorId(3);
$proveedor->setNombre('Martin');

$proveedor->Actualizar();

highlight_string(var_export($proveedor,true));*/

/*$proveedor = Proveedor::obtenerPorId(3);

highlight_string(var_export($proveedor,true));*/


/*$listadoProveedores = Proveedor::obtenerTodos();

highlight_string(var_export($listadoProveedores,true));
*/


?>