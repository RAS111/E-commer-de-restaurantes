<?php

require_once 'MySQL.php';


class Contacto {

    private $_idContacto;
    private $_idPersona;
    private $_idTipoContacto;
    private $_valor;

    private $_descripcion;

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
    public function getIdPersona()
    {
        return $this->_idPersona;
    }

    /**
     * @param mixed $_idPersona
     *
     * @return self
     */
    public function setIdPersona($_idPersona)
    {
        $this->_idPersona = $_idPersona;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdTipoContacto()
    {
        return $this->_idTipoContacto;
    }

    /**
     * @param mixed $_idTipoContacto
     *
     * @return self
     */
    public function setIdTipoContacto($_idTipoContacto)
    {
        $this->_idTipoContacto = $_idTipoContacto;

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
        $sql = "INSERT INTO persona_contacto (id_contacto, valor, id_tipo_contacto, id_persona) VALUES (NULL, '$this->_valor', '$this->_idTipoContacto', '$this->_idPersona') ";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idContacto = $idInsertado;
    }

    public function eliminar() {
        $sql = "DELETE FROM persona_contacto WHERE id_contacto = $this->_idContacto " ;


        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM persona_contacto WHERE id_contacto = '$id' " ;

    
        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $contacto = self::_generarContacto($data);
        return $contacto;
    }

    private function _generarContacto($data) {
        $contacto = new Contacto();
        $contacto->_idContacto = $data['id_contacto'];
        $contacto->_valor = $data['valor'];
        return $contacto;
    }
    
    public static function obtenerPorIdPersona($idPersona) {
        $sql = "SELECT persona_contacto.id_contacto, persona_contacto.id_persona, "
             . "persona_contacto.id_tipo_contacto, persona_contacto.valor, "
             . "tipocontacto.descripcion "
             . "FROM persona_contacto "
             . "INNER JOIN tipocontacto on tipocontacto.id_tipo_contacto = persona_contacto.id_tipo_contacto "
             . "WHERE persona_contacto.id_persona = $idPersona " ;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoContactos($datos);
        return $listado;        
    }

    private function _generarListadoContactos($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $contacto = new Contacto();
            $contacto->_idContacto = $registro['id_contacto'];
            $contacto->_idPersona = $registro['id_persona'];
            $contacto->_idTipoContacto = $registro['id_tipo_contacto'];
            $contacto->_valor = $registro['valor'];
            $contacto->_descripcion = $registro['descripcion'];
            $listado[] = $contacto;
        }
        return $listado;
    }

    public function __toString() {
        return $this->_valor .  " - " .  $this->_descripcion;
    }
}


?>