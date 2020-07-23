<?php

require_once 'MySQL.php';
require_once 'Menu.php';

class Receta {

	private $_idReceta;
	private $_nombre;
    private $_idMenu;
	
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
    public function getIdMenu()
    {
        return $this->_idMenu;
    }

    /**
     * @param mixed $_idMenu
     *
     * @return self
     */
    public function setIdMenu($_idMenu)
    {
        $this->_idMenu = $_idMenu;

        return $this;
    }    
    
    public function guardar() {
        $sql = "INSERT INTO receta_producto (id_receta_producto, nombre id_menu)"
             . "VALUES (NULL, '$this->_nombre', $this->_idMenu )";

        
        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idReceta = $idInsertado;
    }

    public function actualizar() {
        $sql = "UPDATE receta_producto SET nombre = '$this->nombre' "
             . "WHERE id_receta_producto = $this->_idReceta";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public static function obtenerPorIdMenu($idMenu) {
        $sql = "SELECT * FROM receta_producto INNER JOIN receta ON receta.id_receta = receta_producto.id_receta WHERE id_menu = $idMenu ";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoReceta($datos);
        return $listado;
    }

    private function _generarListadoReceta($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $receta = new Receta();
            $receta->_idReceta = $registro['id_receta'];
            $receta->_nombre = $registro['nombre'];
            $receta->_idMenu = $registro['id_menu'];      
            $listado[] = $receta;
        }
        return $listado;
    }

    public static function obtenerTodos() {

    }

    private function _generarListadoRecetas() {

    }


}

?>