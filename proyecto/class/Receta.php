<?php

require_once 'MySQL.php';

class Receta {

	private $_idReceta;
	private $_nombre;
	private $_cantidad;
	private $_arrProductos;
	
    /**
     * @return mixed
     */
    public function getIdReceta()
    {
        return $this->_idReceta;
    }

    /**
     * @param mixed $_idReceta
     *
     * @return self
     */
    public function setIdReceta($_idReceta)
    {
        $this->_idReceta = $_idReceta;

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
    public function getCantidad()
    {
        return $this->_cantidad;
    }

    /**
     * @param mixed $_cantidad
     *
     * @return self
     */
    public function setCantidad($_cantidad)
    {
        $this->_cantidad = $_cantidad;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArrProductos()
    {
        return $this->_arrProductos;
    }

    /**
     * @param mixed $_arrProductos
     *
     * @return self
     */
    public function setArrProductos($_arrProductos)
    {
        $this->_arrProductos = $_arrProductos;

        return $this;
    }
    
    public function guardar() {
        $sql = "INSERT INTO receta_producto (id_receta_producto, nombre, cantidad, id_producto)"
             . "VALUES (NULL, '$this->_nombre', $this->_cantidad, $this->_arrProductos)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idReceta = $idInsertado;
    }

    public function actualizar() {
        $sql = "UPDATE receta_producto SET nombre = '$this->nombre', cantidad = $this->_cantidad "
             . "WHERE id_receta_producto = $this->_idReceta";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public static function obtenerPorId() {

    }

    private function _generarReceta() {

    }

    public static function obtenerTodos() {

    }

    private function _generarListadoRecetas() {

    }
}

?>