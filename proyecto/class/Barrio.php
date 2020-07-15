<?php

require_once 'MySQL.php';

class barrio {
	private $_idBarrio;
	private $_nombre;

    public function __construct($nombre) {
        $this->_nombre = $nombre;
    }

	 /**
     * @return mixed
     */
    public function getIdBarrio()
    {
        return $this->_idBarrio;
    }

    /**
     * @param mixed $_idBarrio
     *
     * @return self
     */
    public function setIdBarrio($_idBarrio)
    {
        $this->_idBarrio = $_idBarrio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->_nombre;
    }

    /**
     * @param mixed $_nombre
     *
     * @return self
     */
    public function setNombre($_nombre)
    {
        $this->_nombre = $_nombre;

        return $this;
    }

    public function guardar() {
    	$sql = "INSERT INTO barrio (id_barrio, nombre) VALUES (NULL, '$this->_nombre') ";

    	$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idBarrio = $idInsertado;
    }

    public function actualizar() {
        $sql = "UPDATE barrio SET nombre = '$this->_nombre' WHERE id_barrio = $this->_idBarrio ";

        $mysql = new MySQL();
        $mysql->actualizar();
    }

    public static function obtenerTodos() {
        $sql = "SELECT * FROM barrio ";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoBarrio($datos);
        return $listado;
    }

    private function _generarListadoBarrio($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $barrio = new Barrio($registro['nombre']);
            $barrio->_idBarrio = $registro['id_barrio'];
            $listado[] = $barrio;
        }
        return $listado;
    }

    public function __toString() {
        return $this->_nombre;
    }

   
}

?>