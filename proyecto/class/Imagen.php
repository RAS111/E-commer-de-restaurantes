<?php

require_once 'MySQL.php';

class Imagen {

	private $_idImagen;
	private $_descripcion;	
    private $_idItem;

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
    public function getDescripcion()
    {
        return $this->_descripcion;
    }

    /**
     * @param mixed $_descripcion
     *
     * @return self
     */
    public function setImagen($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
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
    public function guardar() {
    	$sql = "INSERT INTO imagen (id_imagen, imagen, id_item) VALUES (NULL, '$this->_descripcion', $this->_idItem)";
        
    	$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idImagen = $idInsertado;
    }

    public function actualizar() {
    	$sql = "UPDATE imagen SET imagen = '$this->_descripcion' WHERE id_imagen = $this->_idImagen";

    	$mysql = new MySQL();
        $mysql->actualizar($sql);
    }

     public function obtenerPorIdItem($_idItem){
        $sql = "SELECT * FROM imagen INNER JOIN item ON item.id_item = imagen.id_item WHERE item.id_item = $_idItem ";


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoImagen($datos);

        return $listado;
    }

    private function _generarListadoImagen($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $imagen = new Imagen();
            $imagen->_idImagen = $registro['id_imagen'];
            $imagen->_descripcion = $registro['descripcion'];
            $imagen->_idItem = $registro['id_item'];
            
            $listado[] = $imagen;
        }

        return $listado;

    }

    public function __toString(){
        return $this->_descripcion;
    }
    
}

?>