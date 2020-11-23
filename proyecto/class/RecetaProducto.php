<?php

require_once 'MySQL.php';
require_once 'Menu.php';
require_once 'Producto.php';


class RecetaProducto {
	private $_idRecetaProducto;
	private $_cantidad;
	private $_idProducto;
	private $_idMenu;

    public $menu;
    public $producto;

    /**
     * @return mixed
     */
    public function getIdRecetaProducto()
    {
        return $this->_idRecetaProducto;
    }

    /**
     * @param mixed $_idRecetaProducto
     *
     * @return self
     */
    public function setIdRecetaProducto($_idRecetaProducto)
    {
        $this->_idRecetaProducto = $_idRecetaProducto;

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
    public function getIdProducto()
    {
        return $this->_idProducto;
    }

    /**
     * @param mixed $_idProducto
     *
     * @return self
     */
    public function setIdProducto($_idProducto)
    {
        $this->_idProducto = $_idProducto;

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

    /**
     * @return mixed
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * @param mixed $producto
     *
     * @return self
     */
    public function setProducto()
    {
        $this->producto = Producto::obtenerPorId($this->_idProducto);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMenu()
    {
        return $this->producto;
    }

    /**
     * @param mixed $producto
     *
     * @return self
     */
    public function setMenu()
    {
        $this->menu = Menu::obtenerPorId($this->_idMenu);

        return $this;
    }

    public function guardar(){
    	$sql = "INSERT INTO receta_producto (id_receta_producto, cantidad, id_producto, id_menu)VALUES (NULL, $this->_cantidad, $this->_idProducto, $this->_idMenu) ";

    	$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idRecetaProducto = $idInsertado;
    }

    public function actualizar(){
    	$sql = "UPDATE receta_producto SET cantidad = $this->_cantidad, id_producto = $this->_idProducto, id_receta = $this->_idReceta  WHERE receta_producto = $this->_idRecetaProducto";

    	$mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function eliminar(){
        $sql = "DELETE FROM receta_producto WHERE receta_producto.id_receta_producto = $this->_idRecetaProducto";
        
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM receta_producto WHERE id_receta_producto = $id ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $recetaProducto = self::_generarListadoRecetaProducto($data);

        return $recetaProducto;
    }

    private function _generarListadoRecetaProducto($data) {
        $recetaProducto = new RecetaProducto();
        $recetaProducto->_idRecetaProducto = $data['id_receta_producto'];
        $recetaProducto->_cantidad = $data['cantidad'];
        $recetaProducto->_idProducto = $data['id_producto'];
        $recetaProducto->_idMenu = $data ['id_menu'];
        return $recetaProducto;
    }

    public static function obtenerTodos() {
        $sql = "SELECT * FROM receta_producto ";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoRecetasProductos($datos);

        return $listado;
    }

    private function _generarListadoRecetasProductos($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $recetaProducto = new RecetaProducto();
            $recetaProducto->_idRecetaProducto = $registro['id_receta_producto'];
            $recetaProducto->_cantidad = $registro['cantidad'];
            $recetaProducto->_idProducto = $registro['id_producto'];
            $recetaProducto->_idMenu = $registro['id_menu'];
            $listado[] = $recetaProducto;
        }
        return $listado;
    }

    public static function obtenerPorIdMenu($idMenu) {
        $sql = "SELECT * FROM receta_producto WHERE id_menu = $idMenu";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarRecetaProductos($datos);
        return $listado;
    }

    private function _generarRecetaProductos($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $recetaProducto = new RecetaProducto();
            $recetaProducto->_idRecetaProducto = $registro['id_receta_producto'];
            $recetaProducto->_cantidad = $registro['cantidad'];
            $recetaProducto->_idProducto = $registro['id_producto'];
            $recetaProducto->_idMenu = $registro['id_menu'];
            $recetaProducto->setProducto();
            $recetaProducto->setMenu();
            $listado[] = $recetaProducto;
        }
        return $listado;
    }
  

    
   
}

?>