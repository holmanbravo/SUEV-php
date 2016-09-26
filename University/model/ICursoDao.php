<?php

/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 09/08/2016
 * Time: 9:53 PM
 */
interface ICursoDao
{

    public function  insertCursos(Curso $curso);
    public function  consutarCurso();
    public  function consultarCursoUsuario($usuario);
    public  function consultarNombreCurso($codigo);
}
?>