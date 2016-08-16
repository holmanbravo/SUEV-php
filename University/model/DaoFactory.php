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

    public static function getPreguntasDao()
    {
        return new PreguntasDao();
    }
}
?>