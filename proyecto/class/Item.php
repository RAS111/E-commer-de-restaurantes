<?php

require_once 'MySQL.php';
require_once 'Imagen.php';

class Item {
	public $_idItem;
	public $_nombre;
	public $_precio;
	public $_idRubro;
    public $_idImagen;

	public $arrImagen;


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
        return $this->arrImagen;
    }

    /**
     * @param mixed $arrImagen
     *
     * @return self
     */
    public function setArrImagen()
    {

        $this->arrImagen = Imagen::obtenerPorIdItem($this->_idItem);

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

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM item WHERE id_item = $id ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $item = self::_generarListadoItem($data);

        return $item;
    }

    private function _generarListadoItem($data) {
        $item = new Item($data['nombre'], $data['precio']);
        $item->_idItem = $data['id_item'];
        $item->_idRubro = $data['id_rubro'];
        return $item;
    }

    public static function obtenerTodos() {
        $sql = "SELECT * FROM Item";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoItems($datos);

        return $listado;
    }

    private function _generarListadoItems($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $item = new Item($registro['nombre'], $registro['precio']);
            $item->_idItem = $registro['id_item'];
            $item->_idRubro = $registro['id_rubro'];  
            $listado[] = $item;
        }
        return $listado;
    }
   
    

    public function __toString() {
    	return $this->_nombre . "," . $this->_precio;
    }


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
}

?>