<?php
require_once dirname(__dir__ ) . '/model/CursoDao.php';
require_once dirname(__dir__ ) .'/model/Curso.php';
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 09/08/2016
 * Time: 9:51 PM
 */


            try {

                //sino hay mensajes de error entonces:
                //1. Se crea un objeto de tipo usuario con los datos recogidos del formulario


                $pdao = new CursoDao();
                    $codigo=15;
                    $nombre=$_POST['nombre'];
                    $idespecialidad=$_POST['idespecialidad'];
                    $newCurso = new Curso($codigo,$nombre,$idespecialidad);
                    $pdao->insertCursos($newCurso);



            } catch (exception $e) {
                echo $e->getMessage();
            }
            header('Location: ../view/crearCursos.php?msg=' . $msg . '&c=0');


?>