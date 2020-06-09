<?php

require_once 'Persona.php';
require_once 'MySQL.php';

class Proveedor extends Persona{
	private $_idProveedor;
	private $_razonSocial;
	private $_cuil;

    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->_idProveedor;
    }

    /**
     * @param mixed $_idProveedor
     *
     * @return self
     */
    public function setIdProveedor($_idProveedor)
    {
        $this->_idProveedor = $_idProveedor;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRazonSocial()
    {
        return $this->_razonSocial;
    }

    /**
     * @param mixed $_razonSocial
     *
     * @return self
     */
    public function setRazonSocial($_razonSocial)
    {
        $this->_razonSocial = $_razonSocial;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCuil()
    {
        return $this->_cuil;
    }

    /**
     * @param mixed $_cuil
     *
     * @return self
     */
    public function setCuil($_cuil)
    {
        $this->_cuil = $_cuil;

        return $this;
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM proveedor INNER JOIN persona ON proveedor.id_persona = persona.id_persona "
             . "WHERE id_proveedor =" .$id;

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $proveedor = self::_generarProveedor($data);

        return $proveedor;
    }

    private function _generarProveedor($data) {
        $proveedor = new Proveedor ($data['nombre'], $data['apellido']);
        $proveedor->_idProveedor = $data['id_proveedor'];
        $proveedor->_razonSocial = $data['razon_social'];
        $proveedor->_cuil = $data['cuil'];
        $proveedor->_idPersona = $data['id_persona'];
        $proveedor->_sexo = $data['sexo'];
        $proveedor->_fechaNacimiento = $data['fecha_nacimiento'];
        $proveedor->_idTipoDocumento = $data['id_tipo_documento'];
        $proveedor->_numeroDocumento = $data['numero_documento'];
        $proveedor->_estado = $data['id_estado'];
        return $proveedor;
    }

    public static function obtenerTodos() {
        $sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, proveedor.id_proveedor,"
             . "proveedor.razon_social, proveedor.cuil"
             . "FROM persona "
             . "INNER JOIN proveedor ON proveedor.id_persona = persona.id_persona";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoProveedores($datos);

        return $listado;

    }

    private function _generarListadoProveedores($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $proveedor = new Proveedor($registro['nombre'], $registro['apellido']);
            $proveedor->_idProveedor = $registro['id_proveedor'];
            $proveedor->_idPersona = $registro['id_persona'];
            $proveedor->_razonSocial = $registro['razon_social'];
            $proveedor->_cuil = $registro['cuil'];
            $listado[] = $proveedor;
        }
        return $listado;
    }

    public function guardar() {
        parent::guardar();
        
        $sql = "INSERT INTO proveedor (id_proveedor, razon_social, cuil, id_persona)"
             . " VALUES (NULL, '$this->_razonSocial', '$this->_cuil', $this->_idPersona)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idProveedor = $idInsertado;
    }

    public function actualizar() {
        parent::actualizar();

        $sql = "UPDATE proveedor SET razon_social = '$this->_razonSocial', cuil = '$this->_cuil'"
             . "WHERE id_proveedor = $this->_idProveedor";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

}

?>