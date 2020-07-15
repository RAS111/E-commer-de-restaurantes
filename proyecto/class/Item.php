<?php

require_once 'MySQL.php';

class Item {
	protected $_idItem;
	protected $_nombre;
	protected $_precio;
	protected $_idRubro;
	protected $_arrImagen;

	public function __construct($nombre, $precio){
		$this->_nombre = $nombre;
		$this->_precio = $precio;
	}

    /**
     * @return mixed
     */
    public function getIdItem()
    {
        return $this->_idItem;
    }

    /**
     * @param mixed $_idItem
     *
     * @return self
     */
    public function setIdItem($_idItem)
    {
        $this->_idItem = $_idItem;

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

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->_precio;
    }

    /**
     * @param mixed $_precio
     *
     * @return self
     */
    public function setPrecio($_precio)
    {
        $this->_precio = $_precio;

        return $this;
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
    public function getArrImagen()
    {
        return $this->_arrImagen;
    }

    /**
     * @param mixed $_arrImagen
     *
     * @return self
     */
    public function setArrImagen($_arrImagen)
    {
        $this->_arrImagen = $_arrImagen;

        return $this;
    }

    public function guardar() {
    	$sql = "INSERT INTO item (id_item, nombre, precio, id_rubro) "
    		 . "VALUES (NULL, '$this->_nombre', $this->_precio, $this->_idRubro) ";
    	
    	$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idItem = $idInsertado;
    }

    public function actualizar() {
    	$sql = "UPDATE item SET nombre = '$this->_nombre', precio = $this->_precio, id_rubro = $this->_idRubro "
    		 . "WHERE id_item = $this->_idItem ";
    	$mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function __toString() {
    	return $this->_nombre . "," . $this->_precio;
    }

}

?>