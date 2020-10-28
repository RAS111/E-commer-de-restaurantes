<?php


require_once "MySQL.php";
require_once "Producto.php";

class DetalleCompra {
	public $_idDetalleCompra;
	public $_cantidad;
	public $_precio;
	public $_idCompra;
	public $_idProducto;

	public $producto;

    /**
     * @return mixed
     */
    public function getIdDetalleCompra()
    {
        return $this->_idDetalleCompra;
    }

    /**
     * @param mixed $_idDetalleCompra
     *
     * @return self
     */
    public function setIdDetalleCompra($_idDetalleCompra)
    {
        $this->_idDetalleCompra = $_idDetalleCompra;

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
    public function getIdCompra()
    {
        return $this->_idCompra;
    }

    /**
     * @param mixed $_idCompra
     *
     * @return self
     */
    public function setIdCompra($_idCompra)
    {
        $this->_idCompra = $_idCompra;

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

    public function guardar() {
    	$sql = "INSERT INTO detallecompra (id_detalle_compra, cantidad, precio, id_compra, id_producto) VALUES (NULL, $this->_cantidad, $this->_precio, $this->_idCompra, $this->_idProducto);";

    	$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idCompra = $idInsertado;
    }

    public function actualizar() {
         $sql = "UPDATE detalleCompra SET cantidad = $this->_cantidad, precio = $this->_precio, id_producto = $this->_idProducto WHERE id_detalle_compra = $this->_idDetalleCompra";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function eliminar($idcompra){
        $sql = "DELETE FROM detallecompra WHERE id_compra = " .$idcompra;
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function calcularSubtotal() {
        $subtotal = $this->_cantidad * $this->_precio;
        return $subtotal;
    }

    public function obtenerPorId(){

    }

    public function obtenerTodos(){
    	
    }

    public function obtenerPorIdCompra($_idCompra){
        $sql = "SELECT * FROM detallecompra INNER JOIN compra ON compra.id_compra = detallecompra.id_compra WHERE compra.id_compra = $_idCompra ";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoDetalle($datos);

        return $listado;
    }

    private function _generarListadoDetalle($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $detalleCompra = new DetalleCompra();
            $detalleCompra->_idDetalleCompra = $registro['id_detalle_compra'];
            $detalleCompra->_cantidad = $registro['cantidad'];
            $detalleCompra->_precio = $registro['precio'];
            $detalleCompra->_idProducto = $registro ['id_producto'];
            $detalleCompra->setProducto();
            $detalleCompra->_idCompra = $registro ['id_compra'];
            $listado[] = $detalleCompra;
        }

        return $listado;

    }

   
}

?>