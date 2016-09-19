<?php

/**
 * Created by PhpStorm.
 * User: cristian
 */
class DaoFactory
{
    /**
     * @return UsuarioDAO
     */
    public static function getUsuarioDao()
    {
    return new UsuarioDao();
    }

    public static function getPreguntaDao()
    {
        return new PreguntaDao();
    }

    public static function getCursoDao()
    {
        return new CursoDao();
    }
}
?>