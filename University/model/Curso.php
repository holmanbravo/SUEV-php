<?php

/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 09/08/2016
 * Time: 9:53 PM
 */
class Curso
{

private $codigo;
private $nombre;
private $idEspecialidad;

    /**
     * Curso constructor.
     * @param $codigo
     * @param $nombre
     * @param $idEspecialidad
     */
    public function __construct($codigo, $nombre, $idEspecialidad)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->idEspecialidad = $idEspecialidad;
    }

    /**
     * Curso constructor.
     * @param $codigo
     * @param $nombre
     * @param $idespecialidad
     */


    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getIdEspecialidad()
    {
        return $this->idEspecialidad;
    }

    /**
     * @param mixed $idEspecialidad
     */
    public function setIdEspecialidad($idEspecialidad)
    {
        $this->idEspecialidad = $idEspecialidad;
    }

    /**
     * @return mixed
     */





}

?>