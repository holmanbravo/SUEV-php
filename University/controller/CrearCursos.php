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

                $codigo=$pdao->contarcursos()+1;

                $newCurso = new Curso($_POST['codigo'],$_POST['nombre'], $_POST['idespecialidad']);
                //2. Se crea un objeto dao

                //3. Se invoca al metodo insertar el objeto dao pasandole como parametro el objeto usuario creado, el cual devuelve una cadena

                $pdao->insertCursos($newCurso);

            } catch (exception $e) {
                echo $e->getMessage();
            }
            header('Location: ../view/crearCursos.php?msg=' . $msg . '&c=0');


?>