<?

require_once '../../class/Producto.php';


$listaProductos = ProductoFinal::obtenerTodos();


echo json_encode($listaProductos);

?>