<?php

require_once "MySQL.php";
require_once "Proveedor.php";
require_once "FormaPago.php";
require_once "DetalleCompra.php";

class Compra {
	private $_idCompra;
	private $_numero;
	private $_descripcion;
	private $_fecha;
	private $_idProveedor;
	private $_idFormaPago;

	public $arrDetalleCompra;
	public $proveedor;
	public $formaPago;

    /**
     * @return mixed
     */
    public function getIdCompra()
    {
        return $this->_idCompra;
    }

    /**
     * @param mixed $_idCompra
     *
     * @return self
     */
    public function setIdCompra($_idCompra)
    {
        $this->_idCompra = $_idCompra;

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
    public function getIdProveedor()
    {
        return $this->_idProveedor;
    }

    /**
     * @param mixed $_idProveedor
     *
     * @return self
     */
    public function setIdProveedor($_idProveedor)
    {
        $this->_idProveedor = $_idProveedor;

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
    public function getArrDetalleCompra()
    {
        return $this->arrDetalleCompra;
    }

    /**
     * @param mixed $arrDetalleCompra
     *
     * @return self
     */
    public function setArrDetalleCompra()
    {
        $this->arrDetalleCompra = DetalleCompra::obtenerPorIdCompra($this->_idCompra);

        return $this;
    }

     /**
     * @return mixed
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * @param mixed $proveedor
     *
     * @return self
     */
    public function setProveedor()
    {
        $this->proveedor = Proveedor::obtenerPorId($this->_idProveedor);

        return $this;
    }

    public function setFormaPago()
    {
        $this->formaPago = FormaPago::obtenerPorId($this->_idFormaPago);

        return $this;
    }

    public function guardar() {
    	$sql = "INSERT INTO compra (id_compra, numero, descripcion, fecha, id_proveedor, id_forma_pago) VALUES (NULL, $this->_numero, '$this->_descripcion', '$this->_fecha', $this->_idProveedor, $this->_idFormaPago)";
    	$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idCompra = $idInsertado;
    }

    public function actualizar() {
    	$sql = "UPDATE compra SET numero = $this->_numero, descripcion = '$this->_descripcion', fecha = '$this->_fecha' id_proveedor = $this->_idProveedor, id_forma_pago = $this->_idFormaPago WHERE id_compra = $this->_idCompra";
    	
    	$mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->arrDetalleCompra as $detalle) {
           
            $total = $total + $detalle->calcularSubtotal();
        }
        return $total;
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM compra WHERE id_compra = $id ";

        
        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $compra = self::_generarListadoCompra($data);

        return $compra;
    }

    private function _generarListadoCompra($data) {
        $compra = new Compra();
        $compra->_idCompra = $data['id_compra'];
        $compra->_numero = $data['numero'];
        $compra->_fecha = $data['fecha'];
        $compra->_descripcion = $data['descripcion'];
        $compra->_idProveedor = $data['id_proveedor']; 
        $compra->setProveedor(); 
       	$compra->_idFormaPago = $data['id_forma_pago'];
        $compra->setFormaPago();
        $compra->setArrDetalleCompra(); 
        return $compra;
    }

    public function obtenerTodos(){
        $sql = "SELECT * FROM compra ORDER BY id_compra DESC";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoCompras($datos);

        return $listado;
    }

    private function _generarListadoCompras($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $compra = new Compra();
            $compra->_idCompra = $registro['id_compra'];
            $compra->_numero = $registro['numero'];
            $compra->_descripcion = $registro['descripcion'];  
            $compra->_fecha = $registro['fecha'];
            $compra->_idProveedor = $registro['id_proveedor'];
            $compra->setProveedor();
            $compra->_idFormaPago = $registro['id_forma_pago'];
            $compra->setFormaPago();

            $listado[] = $compra;
        }
        return $listado;
    
    }



}

?>