<?php

class FacturaEstado{
	private $_idFacturaEstado;
	private $_descripcion;

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
        $sql = "SELECT * FROM facturaestado WHERE id_factura_estado = $id ";
        
        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $facturaEstado = self::_generarListadoFacturaEstados($data);

        return $facturaEstado;
    }

    private function _generarListadoFacturaEstados($data) {
        $facturaEstado = new FacturaEstado();
        $facturaEstado->_idFacturaEstado = $data['id_factura_estado'];
        $facturaEstado->_descripcion = $data['descripcion'];
        return $facturaEstado;
    }

    public static function obtenerTodos() {
        $sql = "SELECT * FROM facturaestado ";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoEstados($datos);

        return $listado;
    }

    private function _generarListadoEstados($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $facturaEstado = new FacturaEstado();
            $facturaEstado->_idFacturaEstado = $registro['id_factura_estado'];
            $facturaEstado->_descripcion = $registro['descripcion'];
             
            $listado[] = $facturaEstado;
        }
        return $listado;
    }

    public function __toString() {
    	return $this->_descripcion;
    }

}

?>