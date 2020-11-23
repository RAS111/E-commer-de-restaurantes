<?php

require_once 'MySQL.php';
require_once 'Item.php';

class Producto extends Item {

	public $_idProducto;
	public $_stockMinimo;
	public $_stockActual;
	public $_stockMaximo;
	
    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->_idProducto;
    }

    /**
     * @param mixed $_idProducto
     *
     * @return self
     */
    public function setIdProducto($_idProducto)
    {
        $this->_idProducto = $_idProducto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStockMinimo()
    {
        return $this->_stockMinimo;
    }

    /**
     * @param mixed $_stockMinimo
     *
     * @return self
     */
    public function setStockMinimo($_stockMinimo)
    {
        $this->_stockMinimo = $_stockMinimo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStockActual()
    {
        return $this->_stockActual;
    }

    /**
     * @param mixed $_stockActual
     *
     * @return self
     */
    public function setStockActual($_stockActual)
    {
        $this->_stockActual = $_stockActual;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStockMaximo()
    {
        return $this->_stockMaximo;
    }

    /**
     * @param mixed $_stockMaximo
     *
     * @return self
     */
    public function setStockMaximo($_stockMaximo)
    {
        $this->_stockMaximo = $_stockMaximo;

        return $this;
    }

    public function guardar() {
    	parent::guardar();
    	$sql = "INSERT INTO producto (id_producto, stock_minimo, stock_actual, stock_maximo, id_item) VALUES (NULL, $this->_stockMinimo, $this->_stockActual, $this->_stockMaximo, $this->_idItem)";

    	$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idProducto = $idInsertado;
    }

    public function actualizar() {
    	parent::actualizar();
    	$sql = "UPDATE producto SET stock_actual = $this->_stockActual WHERE id_producto = $this->_idProducto ";


    	$mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function descontarStock($idPedido) {
        $sql = "UPDATE producto 
               INNER JOIN detallepedido ON detallepedido.id_item = producto.id_item
               INNER JOIN pedidoss ON pedidoss.id_pedido = detallepedido.id_pedido
               SET producto.stock_actual = producto.stock_actual - detallepedido.cantidad
               WHERE pedidoss.id_pedido = $idPedido";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function aumentarStockVenta($idFactura) {
        $sql = "UPDATE producto 
               INNER JOIN detallepedido ON detallepedido.id_item = producto.id_item
               INNER JOIN pedidoss ON pedidoss.id_pedido = detallepedido.id_pedido
               INNER JOIN factura ON factura.id_pedido = pedidoss.id_pedido
               SET producto.stock_actual = producto.stock_actual + detallepedido.cantidad
               WHERE factura.id_factura = $idFactura";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function aumentarStock($numero) {
        $sql = "UPDATE producto 
                INNER JOIN detallecompra ON detallecompra.id_producto = producto.id_producto
                INNER JOIN compra ON compra.id_compra = detallecompra.id_compra
                SET producto.stock_actual = producto.stock_actual + detallecompra.cantidad
                WHERE compra.numero = $numero";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function descontarStockCompra($numero) {
        $sql = "UPDATE producto 
                INNER JOIN detallecompra ON detallecompra.id_producto = producto.id_producto
                INNER JOIN compra ON compra.id_compra = detallecompra.id_compra
                SET producto.stock_actual = producto.stock_actual - detallecompra.cantidad
                WHERE compra.numero = $numero";
        
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function obtenerPorNumeroFactura($numero){
        $sql = "SELECT * FROM producto
                INNER JOIN detallecompra ON detallecompra.id_producto = producto.id_producto
                INNER JOIN compra ON compra.id_compra = detallecompra.id_compra
                WHERE compra.id_compra = $numero";


        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $producto = self::_generarProductoPorNumeroFactura($data);
        return $producto;
    }

     private function _generarProductoPorNumeroFactura($data) {
        $producto = new Producto($data['nombre'], $data['precio']);
        $producto->_idProducto = $data['id_producto'];
        $producto->_idItem = $data['id_item'];
        $producto->_idRubro = $data['id_rubro'];
        $producto->_stockActual = $data['stock_actual'];
        return $producto;
    }

    public function obtenerPorIdFactura($idFactura) {
        $sql = "SELECT * FROM producto 
                INNER JOIN detallepedido ON detallepedido.id_item = producto.id_item
                INNER JOIN pedidoss ON pedidoss.id_pedido = detallepedido.id_pedido
                INNER JOIN item ON item.id_item = producto.id_item
                INNER JOIN factura ON factura.id_pedido = pedidoss.id_pedido
                WHERE factura.id_factura = $idFactura";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $producto = self::_generarProducto($data);
        return $producto;
    }

    public function obtenerPorIdPedido($idPedido){
        $sql = "SELECT * FROM producto
                INNER JOIN detallepedido ON detallepedido.id_item = producto.id_item
                INNER JOIN pedidoss ON pedidoss.id_pedido = detallepedido.id_pedido
                INNER JOIN item ON item.id_item = producto.id_item
                WHERE pedidoss.id_pedido = $idPedido";


        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $producto = self::_generarProductoPorIdPedido($data);
        return $producto;
    }

    private function _generarProductoPorIdPedido($data) {
        $producto = new Producto($data['nombre'], $data['precio']);
        $producto->_idProducto = $data['id_producto'];
        $producto->_idItem = $data['id_item'];
        $producto->_idRubro = $data['id_rubro'];
        $producto->_stockActual = $data['stock_actual'];
        return $producto;
    }
    

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM producto INNER JOIN item ON item.id_item = producto.id_item 
            
            WHERE id_producto = '$id' ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $producto = self::_generarProducto($data);
        return $producto;

    }

    private function _generarProducto($data) {
        $producto = new Producto($data['nombre'], $data['precio']);
        $producto->_idProducto = $data['id_producto'];
        $producto->_idItem = $data['id_item'];
        $producto->_idRubro = $data['id_rubro'];
        $producto->_stockActual = $data['stock_actual'];
        $producto->_stockMinimo = $data['stock_minimo'];
        $producto->_stockMaximo = $data['stock_maximo'];
       
        return $producto;
    }

    public static function obtenerTodos() {
        $sql = "SELECT item.id_item, item.nombre, item.precio, producto.stock_actual, producto.id_producto "
             . "FROM item "
             . "INNER JOIN producto ON producto.id_item = item.id_item ";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoProductos($datos);

        return $listado;
    }

    private function _generarListadoProductos($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $producto = new Producto($registro['nombre'], $registro['precio']);
            $producto->_idProducto = $registro['id_producto'];
            $producto->_idItem = $registro['id_item'];
            

            $producto->_stockActual = $registro['stock_actual'];
            $listado[] = $producto;
        }
        return $listado;
    }

    public static function obtenerPorRubro() {
        $sql = "SELECT * FROM item INNER JOIN producto ON producto.id_item = item.id_item WHERE id_rubro = 2 ";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoPorRubro($datos);

        return $listado;
    }

    private function _generarListadoPorRubro($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $producto = new Producto($registro['nombre'], $registro['precio']);
            $producto->_idProducto = $registro['id_producto'];
            $producto->_idItem = $registro['id_item'];
            $producto->_stockActual = $registro['stock_actual'];
            $producto->_idRubro = $registro['id_rubro'];
            $listado[] = $producto;
        }
        return $listado;
    }

    public static function obtenerProductosPorIdReceta($idReceta) {
        $sql = "SELECT *
                FROM producto 
                INNER JOIN item on item.id_item = producto.id_item
                INNER JOIN receta_producto on receta_producto.id_producto = producto.id_producto 
                INNER JOIN receta on receta.id_receta = receta_producto.id_receta 
                WHERE receta.id_receta =  $idReceta ";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarProductos($datos);
        return $listado;
    }

    private function _generarProductos($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $producto = new Producto($registro['nombre'], $registro['precio']);
            $producto->_idProducto = $registro['id_producto'];
            $producto->_idItem = $registro['id_item'];
            $listado[] = $producto;
        }
        return $listado;
    }




    public function __toString() {
        return $this->_nombre;
    }
}

?>