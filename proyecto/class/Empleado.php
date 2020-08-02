<?php

require_once 'Persona.php';
require_once 'MySQL.php';

class Empleado extends Persona {
	private $_idEmpleado;

    /**
     * @return mixed
     */
    public function getIdEmpleado()
    {
        return $this->_idEmpleado;
    }

    /**
     * @param mixed $_idEmpleado
     *
     * @return self
     */
    public function setIdEmpleado($_idEmpleado)
    {
        $this->_idEmpleado = $_idEmpleado;

        return $this;
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM empleado e INNER JOIN persona  p ON e.id_persona = p.id_persona WHERE id_empleado =" .$id;

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $empleado = self::_generarEmpleado($data);

        return $empleado;
    }

    private function _generarEmpleado($data) {
        $empleado = new Empleado($data['nombre'], $data['apellido']);
        $empleado->_idEmpleado = $data['id_empleado'];
        $empleado->_idPersona = $data['id_persona'];
        $empleado->_sexo = $data['sexo'];
        $empleado->_fechaNacimiento = $data['fecha_nacimiento'];
        $empleado->_idTipoDocumento = $data['id_tipo_documento'];
        $empleado->_numeroDocumento = $data['numero_documento'];
        $empleado->setDomicilio();
        $empleado->setContactos();
        $empleado->_estado = $data['id_estado'];
        return $empleado;
    }

    public static function obtenerTodos() {
        $sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, empleado.id_empleado FROM persona INNER JOIN empleado ON empleado.id_persona = persona.id_persona";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoEmpleados($datos);

        return $listado;

    }

    private function _generarListadoEmpleados($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $empleado = new Empleado($registro['nombre'], $registro['apellido']);
            $empleado->_idEmpleado = $registro['id_empleado'];
            $empleado->_idPersona = $registro['id_persona'];
            $listado[] = $empleado;
        }
        return $listado;
    }

    public function guardar() {
        parent::guardar();

        $sql = "INSERT INTO empleado (id_empleado, id_persona) VALUES (NULL, $this->_idPersona)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idEmpleado = $idInsertado;
    }

    public function actualizar() {
        parent::actualizar();

        $sql= "UPDATE empleado WHERE id_empleado = $this->_idEmpleado";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

}

?>