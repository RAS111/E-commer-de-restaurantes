<?php

require_once 'MySQL.php';
require_once 'Item.php';

class Menu extends Item {

	private $_idMenu;
	private $_estado;
	private $_receta;

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

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->_estado;
    }

    /**
     * @param mixed $_estado
     *
     * @return self
     */
    public function setEstado($_estado)
    {
        $this->_estado = $_estado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReceta()
    {
        return $this->_receta;
    }

    /**
     * @param mixed $_receta
     *
     * @return self
     */
    public function setReceta($_receta)
    {
        $this->_receta = $_receta;

        return $this;
    }

    public function guardar() {
    	parent::guardar();
    	$sql = "INSERT INTO Menu (id_menu, id_menu_estado, id_item)"
    		 . "VALUES (NULL, $this->_estado, $this->_idItem)";

    	$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idMenu = $idInsertado;
    }

    public function actualizar() {
    	parent::actualizar();
    	$sql = "UPDATE menu WHERE id_menu = $this->_idMenu";

    	$mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM menu INNER JOIN item ON item.id_item = menu.id_item WHERE id_menu =  '$id' ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $menu = self::_generarMenu($data);
        return $menu;


    }

    private function _generarMenu($data) {
        $menu = new Menu($data['nombre'], $data['precio']);
        $menu->_idMenu = $data['id_menu'];
        $menu->_idItem = $data['id_item'];
        $menu->_rubro = $data['id_rubro'];
        $menu->_estado = $data['id_menu_estado'];
        return $menu;
    }

    public static function obtenerTodos() {
        $sql = "SELECT item.id_item, item.nombre, item.precio, menu.id_menu_estado, menu.id_menu "
             . "FROM item "
             . "INNER JOIN menu ON menu.id_item = item.id_item ";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoMenus($datos);

        return $listado;
    }

    private function _generarListadoMenus($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $menu = new Menu($registro['nombre'], $registro['precio']);
            $menu->_idMenu = $registro['id_menu'];
            $menu->_idItem = $registro['id_item'];
            $menu->_estado = $registro['id_menu_estado'];
            $listado[] = $menu;
        }
        return $listado;
    }
}

?>