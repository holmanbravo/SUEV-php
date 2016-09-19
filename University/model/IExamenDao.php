<?php


interface IExamenDao
{
    public function registrarExamen(Examen $examen,array $preguntas);
    public function consultarIdExamen();
    public function validarFechaExamen($fechaInicio);
}