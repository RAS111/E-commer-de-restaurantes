<?php

require_once 'MySQL.php';

class barrio {
	private $idBarrio;
	private $nombre;

	public function __construct($nombre) {
		$this->nombre = $nombre;
	}
    /**
     * @return mixed
     */
    public function getIdBarrio()
    {
        return $this->idBarrio;
    }

    /**
     * @param mixed $idBarrio
     *
     * @return self
     */
    public function setIdBarrio($idBarrio)
    {
        $this->idBarrio = $idBarrio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function guardar() {
    	$sql = "INSERT INTO barrio (id_barrio, nombre) VALUES (NULL, '$this->nombre')";

    	$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->idBarrio = $idInsertado;
    }

    public function __toString() {
    	return $this->nombre;
    }

    public function actualizar() {
        $sql = "UPDATE barrio SET nombre = '$this_nombre' WHERE id_barrio = $this->_idBarrio";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }
}

?>