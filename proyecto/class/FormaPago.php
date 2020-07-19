<?php

require_once 'MySQL.php';

class FormaPago {

	private $_idFormaPago;
	private $_descripcion;

	public function __construct($descripcion) {
		$this->_descripcion = $descripcion;
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

    public function guardar() {
    	$sql = "INSERT INTO formapago (id_forma_pago, descripcion) VALUES (NULL, '$this->_descripcion') ";

    	$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idFormaPago = $idInsertado;
    }

    public function actualizar() {
    	$sql = "UPDATE formapago SET descripcion = '$this->_descripcion' WHERE id_forma_pago = $this->_idFormaPago";

    	$mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function eliminar() {
    	$sql = "DELETE FROM formapago WHERE id_forma_pago =  $this->_idFormaPago";

        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public static function obtenerTodos() {
        $sql = "SELECT * FROM formapago";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);
        return $listado;
    }

    private function _generarListado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $formaPago = new FormaPago($registro['descripcion']);
            $formaPago->_idFormaPago = $registro['id_forma_pago'];
            $listado[] = $formaPago;
        }
        return $listado;
    }


    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM formapago WHERE id_forma_pago = '$id' ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $formaPago = self::_generarFormaPago($data);
        return $formaPago;
    }

    private function _generarFormaPago($data) {
        $formaPago = new FormaPago($data['descripcion']);
        $formaPago->_idFormaPago = $data['id_forma_pago'];
        return $formaPago;
    }

    
    public function __toString() {
        return $this->_descripcion;
    }
}

?>