<?php

class Examen
{   private $idExamen;
    private $codigoCurso;
    private $usuarioCreacion;
    private $numeroPreguntas;
    private $fechaInicio;
    private $fechaFin;

    /**
     * Examen constructor.
     * @param $codigoCurso
     * @param $usuarioCreacion
     * @param $numeroPreguntas
     * @param $fechaInicio
     * @param $fechaFin
     */
    public function __construct($codigoCurso, $usuarioCreacion, $numeroPreguntas, $fechaInicio, $fechaFin)
    {
        $this->codigoCurso = $codigoCurso;
        $this->usuarioCreacion = $usuarioCreacion;
        $this->numeroPreguntas = $numeroPreguntas;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
    }

    /**
     * @return mixed
     */
    public function getIdExamen()
    {
        return $this->idExamen;
    }

    /**
     * @param mixed $idExamen
     */
    public function setIdExamen($idExamen)
    {
        $this->idExamen = $idExamen;
    }

    /**
     * @return mixed
     */


    public function getCodigoCurso()
    {
        return $this->codigoCurso;
    }

    /**
     * @param mixed $codigoCurso
     */
    public function setCodigoCurso($codigoCurso)
    {
        $this->codigoCurso = $codigoCurso;
    }

    /**
     * @return mixed
     */
    public function getUsuarioCreacion()
    {
        return $this->usuarioCreacion;
    }

    /**
     * @param mixed $usuarioCreacion
     */
    public function setUsuarioCreacion($usuarioCreacion)
    {
        $this->usuarioCreacion = $usuarioCreacion;
    }

    /**
     * @return mixed
     */
    public function getNumeroPreguntas()
    {
        return $this->numeroPreguntas;
    }

    /**
     * @param mixed $numeroPreguntas
     */
    public function setNumeroPreguntas($numeroPreguntas)
    {
        $this->numeroPreguntas = $numeroPreguntas;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * @param mixed $fechaInicio
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * @param mixed $fechaFin
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    }




}

?>