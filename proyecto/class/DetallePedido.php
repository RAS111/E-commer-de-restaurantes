<?php

class DetallePedido {
	private $_idDetallePedido;
	private $_cantidad;
	private $_precio;
	private $_idItem;

    /**
     * @return mixed
     */
    public function getIdDetallePedido()
    {
        return $this->_idDetallePedido;
    }

    /**
     * @param mixed $_idDetallePedido
     *
     * @return self
     */
    public function setIdDetallePedido($_idDetallePedido)
    {
        $this->_idDetallePedido = $_idDetallePedido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->_cantidad;
    }

    /**
     * @param mixed $_cantidad
     *
     * @return self
     */
    public function setCantidad($_cantidad)
    {
        $this->_cantidad = $_cantidad;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->_precio;
    }

    /**
     * @param mixed $_precio
     *
     * @return self
     */
    public function setPrecio($_precio)
    {
        $this->_precio = $_precio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdItem()
    {
        return $this->_idItem;
    }

    /**
     * @param mixed $_idItem
     *
     * @return self
     */
    public function setIdItem($_idItem)
    {
        $this->_item = $_idItem;

        return $this;
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM detallepedido WHERE id_detalle_pedido = $id ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $detalePedido = self::_generarListadoDetallePedido($data);

        return $detalePedido;
    }

    private function _generarListadoDetallePedido($data) {
        $detalePedido = new DetallePedido();
        $detalePedido->_idDetallePedido = $data['id_detalle_pedido'];
        $detalePedido->_cantidad = $data['cantidad'];
        $detalePedido->_precio = $data['precio'];
        $detalePedido->_idItem = $data ['id_item'];
        return $detalePedido;
    }

    public function __toString() {
    	return $this->_precio;
    }

}

?>