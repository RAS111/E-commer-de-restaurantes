<?php

require_once 'MySQL.php';

class Contacto {
	private $_idContacto;
	private $_descripcion;
	private $_valor;

    public function __construct($descripcion, $valor) {
        $this->_descripcion = $descripcion;
        $this->_valor = $valor;
    }
    /**
     * @return mixed
     */
    public function getIdContacto()
    {
        return $this->_idContacto;
    }

   /**
     * @param mixed $_idContacto
     *
     * @return self
     */
    public function setIdContacto($_idContacto)
    {
        $this->_idContacto = $_idContacto;

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
    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->_valor;
    }

    /**
     * @param mixed $_valor
     *
     * @return self
     */
    public function setValor($_valor)
    {
        $this->_valor = $_valor;

        return $this;
    }

    public function guardar() {
        $sql = "INSERT INTO persona_contacto (id_contacto, descripcion, id_tipo_contacto, id_persona)"
              ."VALUES (NULL, '$this->_descripcion', '$this->_valor', $this->_idPersona)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idContacto = $idInsertado;
    }

    public function actualizar() {
        $sql = "UPDATE persona_contacto SET descripcion = '$this->_descripcion', id_tipo_contacto = '$this->_valor'"
               ."WHERE id_contacto = $this->_idContacto ";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function eliminar() {
    	$sql = "DELETE FROM persona_contacto WHERE id_contacto = $this->_idContacto";

        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function __toString() {
        return $this->_descripcion. "," . $this->_valor;
    }
 
}

?>