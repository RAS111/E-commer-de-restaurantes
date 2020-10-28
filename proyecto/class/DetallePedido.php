<?php

require_once 'Item.php';

class DetallePedido {
	public $_idDetallePedido;
	public $_cantidad;
	public $_precio;
	public $_idItem;
    public $_idPedido;

	public $item;
    /**
     * @return mixed
     */
    public function getIdDetallePedido()
    {
        return $this->_idDetallePedido;
    }

    /**
     * @param mixed $_idDetallePedido
     *
     * @return self
     */
    public function setIdDetallePedido($_idDetallePedido)
    {
        $this->_idDetallePedido = $_idDetallePedido;

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
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param mixed $item
     *
     * @return self
     */
    public function setItem()
    {
        $this->item = Item::obtenerPorId($this->_idItem);
        ;
        return $this;
    }

     /**
     * @return mixed
     */
    public function getIdPedido()
    {
        return $this->_idPedido;
    }

    /**
     * @param mixed $_idPedido
     *
     * @return self
     */
    public function setIdPedido($_idPedido)
    {
        $this->_idPedido = $_idPedido;

        return $this;
    }

    public function guardar() {
    	$sql = "INSERT INTO detallepedido (id_detalle_pedido, cantidad, precio, id_item, id_pedido) VALUES (NULL, $this->_cantidad, $this->_precio, $this->_idItem, $this->_idPedido)";


    	$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idDetallePedido = $idInsertado;
    }

    public function actualizar() {
        $sql = "UPDATE detallepedido SET cantidad = $this->_cantidad, precio = $this->_precio, id_item = $this->_idItem WHERE id_detalle_pedido = $this->_idDetallePedido";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function eliminar($idPedido){
        $sql = "DELETE FROM detallepedido WHERE id_pedido = " .$idPedido;
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function calcularSubtotal() {
        $subtotal = $this->_cantidad * $this->_precio;
        return $subtotal;
    }

    public static function obtenerTodos() {
        $sql = "SELECT * FROM detallepedido";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoDetalle($datos);

        return $listado;
    }

    private function _generarListadoDetalle($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $detallePedido = new DetallePedido();
            $detallePedido->_idDetallePedido = $registro['id_detalle_pedido'];
            $detallePedido->_cantidad = $registro['cantidad'];
            $detallePedido->_precio = $registro['precio'];
            $detallePedido->_idItem = $registro['id_item'];
            $detallePedido->setItem();
            $detallePedido->_idPedido = $registro['id_pedido'];        
            $listado[] = $detallePedido;
        }
        return $listado;
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM detallepedido WHERE id_detalle_pedido = $id ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $detallePedido = self::_generarListadoDetallePedido($data);

        return $detallePedido;
    }

    private function _generarListadoDetallePedido($data) {
        $detallePedido = new DetallePedido();
        $detallePedido->_idDetallePedido = $data['id_detalle_pedido'];
        $detallePedido->_cantidad = $data['cantidad'];
        $detallePedido->_precio = $data['precio'];
        $detallePedido->_idItem = $data ['id_item'];
        $detallePedido->_idPedido = $data ['id_pedido'];
        $detallePedido->setItem();
        return $detallePedido;
    }

    public function obtenerPorIdPedido($_idPedido){
        $sql = "SELECT * FROM detallepedido INNER JOIN pedidoss ON pedidoss.id_pedido = detallepedido.id_pedido WHERE pedidoss.id_pedido = $_idPedido ";
        
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoDetalle($datos);

        return $listado;
    }
    //esta funcion esta de mas
    private function _generarListadoDetallePedidos($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $detallePedidos = new DetallePedido();
            $detallePedidos->_idDetallePedido = $datos['id_detalle_pedido'];
            $detallePedidos->_cantidad = $datos['cantidad'];
            $detallePedidos->_precio = $datos['precio'];
            $detallePedidos->_idItem = $datos ['id_item'];
            $detallePedidos->setItem();
            $detallePedidos->_idPedido = $datos ['id_pedido'];
            $listado[] = $detallePedido;
        }

        return $listado;

    }

    public function __toString() {
    	return $this->_precio;
    }

}

?>