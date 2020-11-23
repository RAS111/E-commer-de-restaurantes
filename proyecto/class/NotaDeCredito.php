<?php

require_once "MySQL.php";
require_once "Usuario.php";
require_once "Factura.php";

class NotaDeCredito {
	private $_idNotaDeCredito;
	private $_fecha;
	private $_motivo;
	private $_observacion;
	private $_idUsuario;
	private $_idFactura;

	public $usuario;
	public $factura;

    /**
     * @return mixed
     */
    public function getIdNotaDeCredito()
    {
        return $this->_idNotaDeCredito;
    }

    /**
     * @param mixed $_idNotaDeCredito
     *
     * @return self
     */
    public function setIdNotaDeCredito($_idNotaDeCredito)
    {
        $this->_idNotaDeCredito = $_idNotaDeCredito;

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
    public function getMotivo()
    {
        return $this->_motivo;
    }

    /**
     * @param mixed $_motivo
     *
     * @return self
     */
    public function setMotivo($_motivo)
    {
        $this->_motivo = $_motivo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getObservacion()
    {
        return $this->_observacion;
    }

    /**
     * @param mixed $_observacion
     *
     * @return self
     */
    public function setObservacion($_observacion)
    {
        $this->_observacion = $_observacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->_idUsuario;
    }

    /**
     * @param mixed $_idUsuario
     *
     * @return self
     */
    public function setIdUsuario($_idUsuario)
    {
        $this->_idUsuario = $_idUsuario;

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
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     *
     * @return self
     */
    public function setUsuario()
    {
        $this->usuario = Usuario::obtenerPorId($this->_idUsuario);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFactura()
    {
        return $this->factura;
    }

    /**
     * @param mixed $factura
     *
     * @return self
     */
    public function setFactura()
    {
    	
        $this->factura = Factura::obtenerPorId($this->_idFactura);

        return $this;
    }

    public function guardar(){
        $sql = "INSERT INTO notadecredito (id_nota_de_credito, fecha, motivo, observacion, id_usuario, id_factura) VALUES (NULL, '$this->_fecha', '$this->_motivo', '$this->_observacion', $this->_idUsuario, $this->_idFactura)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idNotaDeCredito = $idInsertado;
    }

    public function obtenerPorId(){

    }

    public function obtenerTodos(){
    	$sql = "SELECT * FROM notadecredito";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoNotaDeCredito($datos);

        return $listado;
    }

    private function _generarListadoNotaDeCredito($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $notaDeCredito = new NotaDeCredito();
            $notaDeCredito->_idNotaDeCredito = $registro['id_nota_de_credito'];
            $notaDeCredito->_fecha = $registro['fecha'];
            $notaDeCredito->_motivo = $registro['motivo'];
            $notaDeCredito->_observacion = $registro['observacion'];    
            $notaDeCredito->_idUsuario = $registro['id_usuario'];
            $notaDeCredito->_idFactura = $registro['id_factura']; 
            $notaDeCredito->setUsuario();
        	$notaDeCredito->setFactura();
            $listado[] = $notaDeCredito;
        }
        return $listado;
    }
}

?>