<?php

require_once 'Persona.php';
require_once 'MySQL.php';

class Cliente extends Persona{
	private $_idCliente;

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->_idCliente;
    }

    /**
     * @param mixed $_idCliente
     *
     * @return self
     */
    public function setIdCliente($_idCliente)
    {
        $this->_idCliente = $_idCliente;

        return $this;
    }

     public static function obtenerPorId($id) {
        $sql = "SELECT * FROM cliente INNER JOIN persona ON cliente.id_persona = persona.id_persona WHERE id_cliente =" .$id;

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $cliente = self::_generarCliente($data);

        return $cliente;
    }

    private function _generarCliente($data) {
        $cliente = new Cliente($data['nombre'], $data['apellido']);
        $cliente->_idCliente = $data['id_cliente'];
        $cliente->_idPersona = $data['id_persona'];
        $cliente->_sexo = $data['sexo'];
        $cliente->_fechaNacimiento = $data['fecha_nacimiento'];
        $cliente->_idTipoDocumento = $data['id_tipo_documento'];
        $cliente->_numeroDocumento = $data['numero_documento'];
        $cliente->_estado = $data['id_estado'];
        return $cliente;
    }

    public static function obtenerTodos() {
        $sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, cliente.id_cliente "
             . "FROM persona "
             . "INNER JOIN cliente ON cliente.id_persona = persona.id_persona";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoCliente($datos);

        return $listado;

    }

    private function _generarListadoCliente($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $cliente = new Cliente($registro['nombre'], $registro['apellido']);
            $cliente->_idCliente = $registro['id_cliente'];
            $cliente->_idPersona = $registro['id_persona'];
            $listado[] = $cliente;
        }
        return $listado;
    }

    public function guardar() {
        parent::guardar();

        $sql = "INSERT INTO Cliente (id_cliente, id_persona) VALUES (NULL, $this->_idPersona)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idCliente = $idInsertado;
    }

    public function actualizar() {
        parent::actualizar();

        $sql= "UPDATE cliente WHERE id_cliente = $this->_idCliente";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

}

?>