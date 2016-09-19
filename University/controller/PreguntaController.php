<?php

//require_once 'UsuarioController1.php';
require_once dirname(__dir__ ) . '/model/PreguntaDao.php';
require_once dirname(__dir__ ) .'/model/Pregunta.php';


if (isset($_REQUEST['crear']) && ($_REQUEST['crear']=='Crear') || isset($_POST['curso'])) {

// se valida que los campos provenientes del formulario contengan datos

    $curso=$_POST['curso'];
    $enunciado=$_POST['enunciado'];
    $respuesta1=$_POST['respuesta1'];
    $respuesta2=$_POST['respuesta2'];
    $respuesta3=$_POST['respuesta3'];
    $respuesta4=$_POST['respuesta4'];
    $respuesta5=$_POST['respuesta5'];
    $correcta=$_POST['opcion'];
    $estado=1;

    $pregunta=new Pregunta($curso,$enunciado,$respuesta1,$respuesta2,$respuesta3,$respuesta4,$respuesta5,$correcta,$estado);

    $preguntaDao = new PreguntaDao();
    $validador=$preguntaDao->insertPreguntas($pregunta);

    if ($validador==1){

        ?>
        <html>
        <link rel="stylesheet" href="../view/componentes/css/sweetalert.css">
        <script type="text/javascript" src="../view/componentes/js/jquery.min.js"></script>
        <script src="../view/componentes/js/sweetalert.min.js"></script>
        <script src="../view/componentes/js/sweetalert-dev.js"></script>
        <div/>
        <script type="text/javascript">
            swal({
                type: "success",
                title: "¡Registro Exitoso!",
                text: "Se han registrado correctamente sus preguntas",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                allowOutsideClick: true
            }, function () {
                window.location.href = "../view/inicio.php";
            });
        </script>
        </html>
        <?php

    }else {


        ?>
        <html>
        <link rel="stylesheet" href="../view/componentes/css/sweetalert.css">
        <script type="text/javascript" src="../view/componentes/js/jquery.min.js"></script>
        <script src="../view/componentes/js/sweetalert.min.js"></script>
        <script src="../view/componentes/js/sweetalert-dev.js"></script>
        <div/>
        <script type="text/javascript">
            swal({
                type: "error",
                title: "¡Registro Fallido!",
                text: "¡NO! Se han registrado correctamente sus preguntas",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                allowOutsideClick: true
            }, function () {
                window.location.href = "../view/crearpreguntas.php";
            });
        </script>
        </html>
        <?php


    }

    }




?>