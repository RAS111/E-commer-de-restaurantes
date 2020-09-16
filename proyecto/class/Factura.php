<?php

class Factura {
	private $_idFactura;
	private $_fecha;
	private $_numero;
	private $_tipo;
	private $_idFormaPago;
	private $_idPedido;

    /**
     * @return mixed
     */
    public function getIdFactura()
    {
        return $this->_idFactura;
    }

    /**
     * @param mixed $_idFactura
     *
     * @return self
     */
    public function setIdFactura($_idFactura)
    {
        $this->_idFactura = $_idFactura;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->_fecha;
    }

    /**
     * @param mixed $_fecha
     *
     * @return self
     */
    public function setFecha($_fecha)
    {
        $this->_fecha = $_fecha;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->_numero;
    }

    /**
     * @param mixed $_numero
     *
     * @return self
     */
    public function setNumero($_numero)
    {
        $this->_numero = $_numero;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->_tipo;
    }

    /**
     * @param mixed $_tipo
     *
     * @return self
     */
    public function setTipo($_tipo)
    {
        $this->_tipo = $_tipo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdFormaPago()
    {
        return $this->_idFormaPago;
    }

    /**
     * @param mixed $_idFormaPago
     *
     * @return self
     */
    public function setIdFormaPago($_idFormaPago)
    {
        $this->_idFormaPago = $_idFormaPago;

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
}

?>