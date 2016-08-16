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
private $idespecialidad;

    /**
     * Curso constructor.
     * @param $codigo
     * @param $nombre
     * @param $idespecialidad
     */

    public function __construct($codigo, $nombre, $idespecialidad)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->idespecialidad = $idespecialidad;
    }

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
    public function getIdespecialidad()
    {
        return $this->idespecialidad;
    }

    /**
     * @param mixed $idespecialidad
     */
    public function setIdespecialidad($idespecialidad)
    {
        $this->idespecialidad = $idespecialidad;
    }




}

?>