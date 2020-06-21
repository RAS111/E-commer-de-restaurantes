<?php

require_once 'MySQL.php';

class Rubro {

	private $_idRubro;
	private $_nombre;	

    public function __construct($nombre){
        $this->_nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getIdRubro()
    {
        return $this->_idRubro;
    }

    /**
     * @param mixed $_idRubro
     *
     * @return self
     */
    public function setIdRubro($_idRubro)
    {
        $this->_idRubro = $_idRubro;

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
    	$sql = "INSERT INTO rubro (id_rubro, nombre ) VALUES (NULL, '$this->_nombre')";
        
    	$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idRubro = $idInsertado;
    }

    public function actualizar() {
    	$sql = "UPDATE rubro SET nombre = '$this->_nombre' WHERE id_rubro = $this->_idRubro";

    	$mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function eliminar() {
    	$sql = "DELETE FROM rubro WHERE id_rubro =  $this->_idRubro";

        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function __toString() {
        return $nombre;
    }
}

?>