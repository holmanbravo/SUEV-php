<?php

/**
 * Created by PhpStorm.
 * User: Sebastián Cardona
 * Date: 31/07/2016
 * Time: 12:05 AM
 */
interface IPreguntaDao
{

    //public function getAll();
    public function insertPreguntas(Pregunta $pre);
    public  function consultarPreguntas($curso);
    public function editarPreguntas(Pregunta $pre);
    public function eliminarPreguntas(Pregunta $pre);
}
?>