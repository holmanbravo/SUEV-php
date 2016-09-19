<?php

/**
 * Created by PhpStorm.
 * User: Sebastián Cardona
 * Date: 31/07/2016
 * Time: 12:04 AM
 */
class Pregunta
{


    private $idcurso;
    private $enunciado;
    private $respuesta1;
    private $respuesta2;
    private $respuesta3;
    private $respuesta4;
    private $respuesta5;
    private $correcta;
    private $estado;

    /**
     * Preguntas constructor.
     * @param $idPregunta
     * @param $idCurso
     * @param $enunciado
     * @param $respuesta1
     * @param $respuesta2
     * @param $respuesta3
     * @param $respuesta4
     * @param $respuesta5
     * @param $correcta
     * @param $estado
     */
    public function __construct($idcurso, $enunciado, $respuesta1, $respuesta2, $respuesta3, $respuesta4, $respuesta5, $correcta, $estado)
    {

        $this->idcurso = $idcurso;
        $this->enunciado = $enunciado;
        $this->respuesta1 = $respuesta1;
        $this->respuesta2 = $respuesta2;
        $this->respuesta3 = $respuesta3;
        $this->respuesta4 = $respuesta4;
        $this->respuesta5 = $respuesta5;
        $this->correcta = $correcta;
        $this->estado = $estado;

    }


    /**
     * @return mixed
     */
    public function getIdcurso()
    {
        return $this->idcurso;
    }

    /**
     * @param mixed $idcurso
     */
    public function setIdcurso($idcurso)
    {
        $this->idcurso = $idcurso;
    }



    /**
     * @return mixed
     */
    public function getEnunciado()
    {
        return $this->enunciado;
    }

    /**
     * @param mixed $enunciado
     */
    public function setEnunciado($enunciado)
    {
        $this->enunciado = $enunciado;
    }

    /**
     * @return mixed
     */
    public function getRespuesta1()
    {
        return $this->respuesta1;
    }

    /**
     * @param mixed $respuesta1
     */
    public function setRespuesta1($respuesta1)
    {
        $this->respuesta1 = $respuesta1;
    }

    /**
     * @return mixed
     */
    public function getRespuesta2()
    {
        return $this->respuesta2;
    }

    /**
     * @param mixed $respuesta2
     */
    public function setRespuesta2($respuesta2)
    {
        $this->respuesta2 = $respuesta2;
    }

    /**
     * @return mixed
     */
    public function getRespuesta3()
    {
        return $this->respuesta3;
    }

    /**
     * @param mixed $respuesta3
     */
    public function setRespuesta3($respuesta3)
    {
        $this->respuesta3 = $respuesta3;
    }

    /**
     * @return mixed
     */
    public function getRespuesta4()
    {
        return $this->respuesta4;
    }

    /**
     * @param mixed $respuesta4
     */
    public function setRespuesta4($respuesta4)
    {
        $this->respuesta4 = $respuesta4;
    }




    /**
     * @return mixed
     */
    public function getRespuesta5()
    {
        return $this->respuesta5;
    }

    /**
     * @param mixed $respuesta5
     */
    public function setRespuesta5($respuesta5)
    {
        $this->respuesta5 = $respuesta5;
    }

    /**
     * @return mixed
     */
    public function getCorrecta()
    {
        return $this->correcta;
    }

    /**
     * @param mixed $correcta
     */
    public function setCorrecta($correcta)
    {
        $this->correcta = $correcta;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }



}
?>