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
    	$sql = "UPDATE producto SET stock_actual = $this->_stockActual WHERE id_producto = $this->_idProducto";

    	$mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public static function obtenerPorId() {

    }

    private function _generarProducto() {

    }

    public static function obtenerTodos() {

    }

    private function _generarListadoProductos() {
        
    }
}

?>