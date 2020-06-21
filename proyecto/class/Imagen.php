<?php

require_once 'MySQL.php';

class Imagen {

	private $_idImagen;
	private $_imagen;	
    private $_item;

    /**
     * @return mixed
     */
    public function getIdImagen()
    {
        return $this->_idImagen;
    }

    /**
     * @param mixed $_idImagen
     *
     * @return self
     */
    public function setIdImagen($_idImagen)
    {
        $this->_idImagen = $_idImagen;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->_imagen;
    }

    /**
     * @param mixed $_imagen
     *
     * @return self
     */
    public function setImagen($_imagen)
    {
        $this->_imagen = $_imagen;

        return $this;
    }

    public function guardar() {
    	$sql = "INSERT INTO imagen (id_imagen, imagen, id_item) VALUES (NULL, $this->_imagen, $this->_item)";

    	$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idImagen = $idInsertado;
    }

    public function actualizar() {
    	$sql = "UPDATE imagen SET imagen = '$this->_imagen' WHERE id_imagen = $this->_idImagen";

    	$mysql = new MySQL();
        $mysql->actualizar($sql);
    }

}

?>