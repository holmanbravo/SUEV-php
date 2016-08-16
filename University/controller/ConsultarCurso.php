<?php
require_once dirname(__DIR__).'/model/CursoDao.php';

/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 13/08/2016
 * Time: 10:48 AM
 */

            $udao = new CursoDao();
            $salida = $udao->consutarCurso();


?>