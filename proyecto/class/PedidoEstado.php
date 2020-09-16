<?php

class PedidoEstado {
	private $_idPedidoEstado;
	private $_descripcion;

    /**
     * @return mixed
     */
    public function getIdPedidoEstado()
    {
        return $this->_idPedidoEstado;
    }

    /**
     * @param mixed $_idPedidoEstado
     *
     * @return self
     */
    public function setIdPedidoEstado($_idPedidoEstado)
    {
        $this->_idPedidoEstado = $_idPedidoEstado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->_descripcion;
    }

    /**
     * @param mixed $_descripcion
     *
     * @return self
     */
    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }

     public static function obtenerPorId($id) {
        $sql = "SELECT * FROM pedidoestado WHERE id_pedido_estado = $id ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $pedidoEstado = self::_generarListadoPedidoEstados($data);

        return $pedidoEstado;
    }

    private function _generarListadoPedidoEstados($data) {
        $pedidoEstado = new PedidoEstado();
        $pedidoEstado->_idPedidoEstado = $data['id_pedido_estado'];
        $pedidoEstado->_descripcion = $data['descripcion'];
        return $pedidoEstado;
    }

    public function __toString() {
    	return $this->_descripcion;
    }
}

?>