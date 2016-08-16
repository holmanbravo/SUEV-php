<?php

/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 7/28/2016
 * Time: 12:54 PM
 */
interface IUsuarioDao
{
    public function getAll();
    public function iniciarSesion($usuario,$contrasenia);
    public function cerrarSesion();
}