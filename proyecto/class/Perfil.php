<?php

require_once 'Modulo.php';
require_once 'MySQL.php';


class Perfil {

	private $_idPerfil;
	private $_descripcion;
	private $_arrModulos;

	public function __construct($descripcion) {
		$this->_descripcion = $descripcion;
	}

    /**
     * @return mixed
     */
    public function getIdPerfil()
    {
        return $this->_idPerfil;
    }

    /**
     * @param mixed $_idPerfil
     *
     * @return self
     */
    public function setIdPerfil($_idPerfil)
    {
        $this->_idPerfil = $_idPerfil;

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

    public static function obtenerPorId($idPerfil) {
        $sql = "SELECT * FROM perfil WHERE id_perfil =  '$idPerfil' ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $perfil = self::_generarPerfil($data);
        return $perfil;
    }

    private function _generarPerfil($data) {
        $perfil = new Perfil($data['descripcion']);
        $perfil->_idPerfil = $data['id_perfil'];
        $perfil->_arrModulos = Modulo::obtenerModulosPorIdPerfil($perfil->_idPerfil);
        return $perfil;
    }

    public function getModulos() {
    	return $this->_arrModulos;
    }

}

?>