<?php

require_once 'MySQL.php';


class Direccion {
	private $_idDireccion;
	private $_altura;
	private $_piso;
	private $_torre;
	private $_departamento;
	private $_sector;
	private $_casa;
	private $_manzana;
	private $_calle;
	private $_barrio;

    /**
     * @return mixed
     */
    public function getIdDireccion()
    {
        return $this->_idDireccion;
    }

    /**
     * @param mixed $_idDireccion
     *
     * @return self
     */
    public function setIdDireccion($_idDireccion)
    {
        $this->_idDireccion = $_idDireccion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->_altura;
    }

    /**
     * @param mixed $_altura
     *
     * @return self
     */
    public function setAltura($_altura)
    {
        $this->_altura = $_altura;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPiso()
    {
        return $this->_piso;
    }

    /**
     * @param mixed $_piso
     *
     * @return self
     */
    public function setPiso($_piso)
    {
        $this->_piso = $_piso;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTorre()
    {
        return $this->_torre;
    }

    /**
     * @param mixed $_torre
     *
     * @return self
     */
    public function setTorre($_torre)
    {
        $this->_torre = $_torre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDepartamento()
    {
        return $this->_departamento;
    }

    /**
     * @param mixed $_departamento
     *
     * @return self
     */
    public function setDepartamento($_departamento)
    {
        $this->_departamento = $_departamento;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSector()
    {
        return $this->_sector;
    }

    /**
     * @param mixed $_sector
     *
     * @return self
     */
    public function setSector($_sector)
    {
        $this->_sector = $_sector;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCasa()
    {
        return $this->_casa;
    }

    /**
     * @param mixed $_casa
     *
     * @return self
     */
    public function setCasa($_casa)
    {
        $this->_casa = $_casa;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getManzana()
    {
        return $this->_manzana;
    }

    /**
     * @param mixed $_manzana
     *
     * @return self
     */
    public function setManzana($_manzana)
    {
        $this->_manzana = $_manzana;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->_calle;
    }

    /**
     * @param mixed $_calle
     *
     * @return self
     */
    public function setCalle($_calle)
    {
        $this->_calle = $_calle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBarrio()
    {
        return $this->_barrio;
    }

    /**
     * @param mixed $_barrio
     *
     * @return self
     */
    public function setBarrio($_barrio)
    {
        $this->_barrio = $_barrio;

        return $this;
    }

    public function Guardar() {
        $sql = "INSERT INTO direccion (id_direccion, altura, piso, torre, departamento, sector, casa, manzana, calle,"
             . "id_barrio, id_persona) VALUES (NULL, $this->_altura, $this->_piso, $this->_torre, $this->_departamento,"
             . "$this->_sector, $this->_casa, $this->_manzana, $this->_calle, $this->_barrio, $this->_idPersona)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idDomicilio = $idInsertado;
    }

    public function Actualizar() {
        $sql = "UPDATE direccion SET altura = $this->_altura, piso = $this->_piso, torre = $this->_torre, "
             . "departamento = $this->_departamento, sector = $this->_sector, casa = $this->_casa, "
             . "manzana = $this->_manzana, calle = $this->_calle, id_barrio = $this->_barrio "
             . "WHERE id_direccion = $this->_idDireccion";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function Eliminar() {
        $sql = "DELETE FROM direccion WHERE id_direccion =  $this->_idDireccion";

        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    
}

?>