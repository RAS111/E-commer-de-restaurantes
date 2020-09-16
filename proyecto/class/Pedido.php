<?php

require_once 'MySQL.php';
require_once 'DetallePedido.php';
require_once 'PedidoEstado.php';
require_once 'Cliente.php';
require_once 'Empleado.php';
class Pedido {
	private $_idPedido;
	private $_fecha;
	private $_tipoEnvio;
	private $_idPedidoEstado;
	private $_idCliente;
	private $_idEmpleado;
	private $_idDetallePedido;
	private $_idFactura;

	public $cliente;
	public $empleado;
	public $arrDetallePedido;
	public $pedidoEstado;

    /**
     * @return mixed
     */
    public function getIdPedido()
    {
        return $this->_idPedido;
    }

    /**
     * @param mixed $_idPedido
     *
     * @return self
     */
    public function setIdPedido($_idPedido)
    {
        $this->_idPedido = $_idPedido;

        return $this;
    }

     /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->_fecha;
    }

    /**
     * @param mixed $_fecha
     *
     * @return self
     */
    public function setFecha($_fecha)
    {
        $this->_fecha = $_fecha;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoEnvio()
    {
        return $this->_tipoEnvio;
    }

    /**
     * @param mixed $_tipoEnvio
     *
     * @return self
     */
    public function setTipoEnvio($_tipoEnvio)
    {
        $this->_tipoEnvio = $_tipoEnvio;

        return $this;
    }

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
    public function getIdCliente()
    {
        return $this->_idCliente;
    }

    /**
     * @param mixed $_idCliente
     *
     * @return self
     */
    public function setIdCliente($_idCliente)
    {
        $this->_idCliente = $_idCliente;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdEmpleado()
    {
        return $this->_idEmpleado;
    }

    /**
     * @param mixed $_idEmpleado
     *
     * @return self
     */
    public function setIdEmpleado($_idEmpleado)
    {
        $this->_idEmpleado = $_idEmpleado;

        return $this;
    }

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
    public function getIdFactura()
    {
        return $this->_idFactura;
    }

    /**
     * @param mixed $_idFactura
     *
     * @return self
     */
    public function setIdFactura($_idFactura)
    {
        $this->_idFactura = $_idFactura;

        return $this;
    }

     /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     *
     * @return self
     */
    public function setCliente()
    {
        $this->cliente = Cliente::obtenerPorId($this->_idCliente);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmpleado()
    {
        return $this->empleado;
    }

    /**
     * @param mixed $empleado
     *
     * @return self
     */
    public function setEmpleado()
    {
        $this->empleado = Empleado::obtenerPorId($this->_idEmpleado);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArrDetallePedido()
    {
        return $this->arrDetallePedido;
    }

    /**
     * @param mixed $arrDetallePedido
     *
     * @return self
     */
    public function setArrDetallePedido()
    {
         $this->arrDetallePedido = DetallePedido::obtenerPorId($this->_idDetallePedido);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPedidoEstado()
    {
        return $this->pedidoEstado;
    }

    /**
     * @param mixed $pedidoEstado
     *
     * @return self
     */
    public function setPedidoEstado()
    {
        $this->pedidoEstado = PedidoEstado::obtenerPorId($this->_idPedidoEstado);

        return $this;
    }

     public static function obtenerPorId($id) {
        $sql = "SELECT * FROM pedido WHERE id_pedido = $id ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $pedido = self::_generarListadoPedido($data);

        return $pedido;
    }

    private function _generarListadoPedido($data) {
        $pedido = new Pedido();
        $pedido->_idPedido = $data['id_pedido'];
        $pedido->_fecha = $data['fecha'];
        $pedido->_tipoEnvio = $data['tipo_envio'];    
        $pedido->_idDetallePedido = $data['id_detalle_pedido'];    
        $pedido->_idPedidoEstado = $data['id_pedido_estado'];       
        $pedido->_idCliente = $data['id_cliente']; 
        $pedido->_idEmpleado = $data['id_empleado'];
        $pedido->setCliente(); 
        $pedido->setEmpleado(); 
        $pedido->setPedidoEstado();
        $pedido->setArrDetallePedido();
        $pedido->_idFactura = $data['id_factura']; 
        return $pedido;
    }

    public static function obtenerTodos() {
        $sql = "SELECT * FROM pedido";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoPedidos($datos);

        return $listado;
    }

    private function _generarListadoPedidos($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $pedido = new Pedido();
            $pedido->_idPedido = $registro['id_pedido'];
            $pedido->_fecha = $registro['fecha'];
            $pedido->_tipoEnvio = $registro['tipo_envio'];
            $pedido->_idPedidoEstado = $registro['id_pedido_estado'];    
            $pedido->_idDetallePedido = $registro['id_detalle_pedido'];
            $pedido->setPedidoEstado();
            $pedido->setArrDetallePedido();    
            $listado[] = $pedido;
        }
        return $listado;
    }
   

   
}

?>