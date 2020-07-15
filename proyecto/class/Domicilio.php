<?php

require_once 'MySQL.php';


class Domicilio {
	private $_idDomicilio;
	private $_altura;
	private $_piso;
	private $_torre;
	private $_departamento;
	private $_sector;
	private $_casa;
	private $_manzana;
	private $_calle;
	private $_idBarrio;
    private $_idPersona;
    
    /**
     * @return mixed
     */
    public function getIdDomicilio()
    {
        return $this->_idDomicilio;
    }

    /**
     * @param mixed $_idDomicilio
     *
     * @return self
     */
    public function setIdDomicilio($_idDomicilio)
    {
        $this->_idDomicilio = $_idDomicilio;

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
    public function getIdBarrio()
    {
        return $this->_idBarrio;
    }

    /**
     * @param mixed $_barrio
     *
     * @return self
     */
    public function setIdBarrio($_idBarrio)
    {
        $this->_idBarrio = $_idBarrio;

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


    public static function obtenerPorIdPersona($idPersona) {
        $sql = "SELECT * FROM domicilio WHERE id_persona = '$idPersona' ";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $datos->fetch_assoc();
        $domicilio = null;

        if ($datos->num_rows > 0) {
            $domicilio = new Domicilio();
            $domicilio->_idDomicilio = $data['id_domicilio'];
            $domicilio->_calle = $data['calle'];
            $domicilio->_altura = $data['altura'];
            $domicilio->_piso = $data['piso'];
            $domicilio->_departamento = $data['departamento'];
            $domicilio->_sector = $data['sector'];
            $domicilio->_torre = $data['torre'];
            $domicilio->_casa = $data['casa'];
            $domicilio->_manzana = $data['manzana'];
            $domicilio->_idBarrio = $data['id_barrio'];
            $domicilio->_idPersona = $data['id_persona'];
        }

        return $domicilio;
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM domicilio d INNER JOIN persona p ON p.id_persona = d.id_persona WHERE id_domicilio = '$id' ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $result->fetch_assoc();
        $domicilio = self::_generarDocimilio($data);

        return $domicilio;
    }

    private function _generarDocimilio($data) {
        $domicilio = new Domicilio();
        $domicilio->_idDomicilio = $data['id_domicilio'];
        $domicilio->_calle = $data['calle'];
        $domicilio->_altura = $data['altura'];
        $domicilio->_piso = $data['piso'];
        $domicilio->_departamento = $data['departamento'];
        $domicilio->_sector = $data['sector'];
        $domicilio->_torre = $data['torre'];
        $domicilio->_casa = $data['casa'];
        $domicilio->_manzana = $data['manzana'];
        $domicilio->_idBarrio = $data['id_barrio'];
        $domicilio->_idPersona = $data['id_persona'];

        return $domicilio;
    }

    public function Guardar() {
        $sql = "INSERT INTO domicilio (id_domicilio, altura, piso, torre, departamento, sector, casa, manzana, calle,"
             . "id_barrio, id_persona) VALUES (NULL, '$this->_altura', '$this->_piso', '$this->_torre', '$this->_departamento',"
             . "'$this->_sector', '$this->_casa', '$this->_manzana', '$this->_calle', $this->_idBarrio, $this->_idPersona) ";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idDomicilio = $idInsertado;
    }

    public function Actualizar() {
        $sql = "UPDATE domicilio SET altura = '$this->_altura', piso = '$this->_piso', torre = '$this->_torre', "
             . "departamento = '$this->_departamento', sector = '$this->_sector', casa = '$this->_casa', "
             . "manzana = '$this->_manzana', calle = '$this->_calle', id_barrio = $this->_idBarrio, "
             . "id_persona = $this->_idPersona "
             . "WHERE id_domicilio = $this->_idDomicilio; ";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function Eliminar() {
        $sql = "DELETE FROM domicilio WHERE id_domicilio =  $this->_idDomicilio";

        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    

    public function __toString() {
        return $this->_calle . ", " . $this->_altura;
    }


}   

    

?>

