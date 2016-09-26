<?php


interface IExamenDao
{
    public function registrarExamen(Examen $examen,array $preguntas);
    public function consultarIdExamen();
    public function validarFechaExamen($fechaInicio);
    public function  validarExamen($usuario,$clave);
    public function notificarExamen($idExamen);
    public function consultarFechas($idExamen);
    public function consultarExamen($usuario);
}