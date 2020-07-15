<?php

require_once 'MySQL.php';
require_once 'Item.php';

class Producto extends Item {

	private $_idProducto;
	private $_stockMinimo;
	private $_stockActual;
	private $_stockMaximo;
	
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
    	$sql = "INSERT INTO producto (id_producto, stock_minimo, stock_actual, stock_maximo, id_item)"
    		 . "VALUES (NULL, $this->_stockMinimo, $this->_stockActual, $this->_stockMaximo, $this->_idItem)";

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

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM producto INNER JOIN item ON item.id_item = producto.id_item WHERE id_producto = '$id' ";

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
            $listado[] = $producto;
        }
        return $listado;
    }
}

?>