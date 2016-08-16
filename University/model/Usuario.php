<?php

/**
 * Created by PhpStorm.
 * User: cristian
 */
class Usuario
{
    private $idUsuario;
    private $identificacion;
    private $estado;
    private $contrasenia;

    public function _construct($idUsuario,$identificacion,$estado,$contrasenia)
    {
        $this->idUsuario = $idUsuario;
        $this->identificacion=$identificacion;
        $this->estado=$estado;
        $this->contrasenia=$contrasenia;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */




    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getContrasenia()
    {
        return $this->contrasenia;
    }

    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;
    }

}

?>