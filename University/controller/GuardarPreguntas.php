<?php

//require_once 'UsuarioController1.php';
require_once dirname(__dir__ ) . '/model/PreguntasDao.php';
require_once dirname(__dir__ ) .'/model/Pregunta.php';


if (isset($_REQUEST['crear']) && ($_REQUEST['crear']=='Crear')) {

// se valida que los campos provenientes del formulario contengan datos
    if(empty($_POST['idcurso']))
    {
        $error[] = "Campo requerido <br>";
    }
    if(empty($_POST['enunciado']))
    {
        $error[] = "campo requerido";
    }
    if(count($error)>0)
    {
        //si hay algun campo vac�o se muestra el mensaje de error en el index
        header('Location: ../index.php?msg=' . implode('',$error).'&c=1');
    }else{

        try{

            //sino hay mensajes de error entonces:
            //1. Se crea un objeto de tipo usuario con los datos recogidos del formulario
            $newPregunta = new Pregunta($_POST['idcurso'], $_POST['enunciado'], $_POST['respuesta1'], $_POST['respuesta2'], $_POST['respuesta3'], $_POST['respuesta4'], $_POST['respuesta5'], $_POST['correcta']);
            //2. Se crea un objeto dao

            $pdao = new PreguntasDao();

            //3. Se invoca al metodo insertar el objeto dao pasandole como parametro el objeto usuario creado, el cual devuelve una cadena
            $msg = $pdao->insertPreguntas($newPregunta);

        }catch (exception $e) {
            echo $e->getMessage();

            //Si se produce una excepci�n se notifica el error
            header('Location: ../index.php?msg=' . $e->getMessage().'&c=1');
        }
        //4. si todo sali� bien, se redirige al index en donde debe verse el registro guardado
        header('Location: ../index.php?msg=' . $msg.'&c=0');
    }

}else{
    //Si se intenta acceder a la pagina desde url se mostrara este mensaje
    echo 'Access denied';
}



?>