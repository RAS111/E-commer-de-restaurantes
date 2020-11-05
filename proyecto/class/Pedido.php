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

	public $cliente;
	public $arrDetallePedido;
	public $pedidoEstado;

    const PENDIENTE = 1;
    public function __construct(){
        $this->_idPedidoEstado = self::PENDIENTE;
    }
    
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
        $this->arrDetallePedido = DetallePedido::obtenerPorIdPedido($this->_idPedido);

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

    public function guardar() {
        $sql = "INSERT INTO pedidoss (id_pedido, fecha, tipo_envio, id_cliente,  id_pedido_estado) VALUES (NULL, '$this->_fecha', '$this->_tipoEnvio',  $this->_idCliente, $this->_idPedidoEstado)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPedido = $idInsertado;
    }

    public function actualizar() {
        $sql  = "UPDATE pedidoss SET fecha = '$this->_fecha', tipo_envio = '$this->_tipoEnvio', id_cliente = $this->_idCliente,  id_pedido_estado = $this->_idPedidoEstado WHERE id_pedido = $this->_idPedido";
        
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->arrDetallePedido as $detalle) {
           
            $total = $total + $detalle->calcularSubtotal();
        }
        return $total;
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM pedidoss WHERE id_pedido = $id ";

        
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
           
        $pedido->_idPedidoEstado = $data['id_pedido_estado'];       
        $pedido->_idCliente = $data['id_cliente']; 
        
        $pedido->setCliente(); 
        $pedido->setArrDetallePedido(); 
        $pedido->setPedidoEstado();
       
        return $pedido;
    }

    public static function obtenerTodos() {
        $sql = "SELECT * FROM pedidoss ORDER BY id_pedido DESC ";

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
            
            $pedido->_idCliente = $registro['id_cliente'];
            $pedido->setCliente(); 
            $pedido->setPedidoEstado();
             
            $listado[] = $pedido;
        }
        return $listado;
    }
   
    public static function obtenerPedidoParaFacturar() {
        $sql = "SELECT * FROM pedidoss WHERE id_pedido_estado = 4 ORDER BY id_pedido DESC";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoFactura($datos);

        return $listado;
    }

    private function _generarListadoFactura($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $pedido = new Pedido();
            $pedido->_idPedido = $registro['id_pedido'];
            $pedido->_fecha = $registro['fecha'];
            $pedido->_tipoEnvio = $registro['tipo_envio'];
            $pedido->_idPedidoEstado = $registro['id_pedido_estado'];        
            $pedido->_idCliente = $registro['id_cliente'];
            $pedido->setCliente(); 
            $pedido->setPedidoEstado();
             
            $listado[] = $pedido;
        }
        return $listado;
    }

     public function obtenerPorIdFactura($_idFactura){
        $sql = "SELECT * FROM pedido INNER JOIN factura ON pedidoss.id_pedido = factura.id_pedido WHERE factura.id_factura = $_idFactura ";
        
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoPedido($datos);

        return $listado;
    }

}

?>