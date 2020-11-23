<?php

require_once 'MySQL.php';
require_once 'Pedido.php';
require_once 'FormaPago.php';
require_once 'FacturaEstado.php';

class Factura {
	private $_idFactura;
	private $_fecha;
	private $_numero;
	private $_tipo;
	private $_idFormaPago;
	private $_idPedido;
    private $_idFacturaEstado;

    public $pedido;
    public $formaPago;
    public $facturaEstado;

    const FINALIZADO = 1;
    public function __construct(){
        $this->_idFacturaEstado = self::FINALIZADO;
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
    public function getNumero()
    {
        return $this->_numero;
    }

    /**
     * @param mixed $_numero
     *
     * @return self
     */
    public function setNumero($_numero)
    {
        $this->_numero = $_numero;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->_tipo;
    }

    /**
     * @param mixed $_tipo
     *
     * @return self
     */
    public function setTipo($_tipo)
    {
        $this->_tipo = $_tipo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdFormaPago()
    {
        return $this->_idFormaPago;
    }

    /**
     * @param mixed $_idFormaPago
     *
     * @return self
     */
    public function setIdFormaPago($_idFormaPago)
    {
        $this->_idFormaPago = $_idFormaPago;

        return $this;
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
    public function getIdFacturaEstado()
    {
        return $this->_idFacturaEstado;
    }

    /**
     * @param mixed $_idFacturaEstado
     *
     * @return self
     */
    public function setIdFacturaEstado($_idFacturaEstado)
    {
        $this->_idFacturaEstado = $_idFacturaEstado;

        return $this;
    }

    public function setPedido()
    {
        $this->pedido = Pedido::obtenerPorId($this->_idPedido);

        return $this;
    }

    public function setFormaPago()
    {
        $this->formaPago = FormaPago::obtenerPorId($this->_idFormaPago);

        return $this;
    }

    public function setFacturaEstado()
    {
        $this->facturaEstado = FacturaEstado::obtenerPorId($this->_idFacturaEstado);
        
        return $this;
    }

    public function guardar(){
        $sql = "INSERT INTO factura (id_factura, fecha, numero, tipo, id_forma_pago, id_pedido, id_factura_estado) VALUES (NULL, '$this->_fecha', $this->_numero, '$this->_tipo', $this->_idFormaPago, $this->_idPedido, $this->_idFacturaEstado);";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idFactura = $idInsertado;
    }

    public function actualizar(){
        $sql = "UPDATE factura SET id_factura_estado = $this->_idFacturaEstado ".
               "WHERE id_factura = $this->_idFactura";
        
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM factura WHERE id_factura = $id ";
        
        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $pedido = self::_generarListadoPedido($data);

        return $pedido;
    }

    private function _generarListadoPedido($data) {
        $factura = new Factura();
        $factura->_idFactura = $data['id_factura'];
        $factura->_fecha = $data['fecha'];
        $factura->_numero = $data['numero'];    
        $factura->_tipo = $data['tipo'];    
        $factura->_idFormaPago = $data['id_forma_pago'];
        $factura->_idPedido = $data['id_pedido']; 
        $factura->setPedido();
        $factura->setFormaPago();
        $factura->setFacturaEstado();
        return $factura;
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM factura ORDER BY id_factura DESC";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoFactura($datos);

        return $listado;
    }

    private function _generarListadoFactura($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $factura = new Factura();
            $factura->_idFactura = $registro['id_factura'];
            $factura->_fecha = $registro['fecha'];
            $factura->_numero = $registro['numero'];
            $factura->_tipo = $registro['tipo'];    
            $factura->_idFormaPago = $registro['id_forma_pago'];
            $factura->_idPedido = $registro['id_pedido']; 
            $factura->_idFacturaEstado = $registro['id_factura_estado']; 
            $factura->setPedido();
            $factura->setFormaPago();
            $factura->setFacturaEstado();
            $listado[] = $factura;
        }
        return $listado;
    }

    public function __toString(){
        return $this->_numero;
    }

    
}

?>