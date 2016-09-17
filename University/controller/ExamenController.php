<?php
require_once dirname(__dir__) . '/model/Examen.php';
require_once dirname(__dir__) . '/model/ExamenDao.php';
session_start();

if(isset($_REQUEST['btnRegistrar']) && ($_REQUEST['btnRegistrar'] == 'Registar') || isset($_POST['curso']))  {
$curso = $_POST['curso'];
$usuario=$_SESSION['usuario'];
$numeroPreguntas=sizeof($_POST['checkbox']);
$fechaInicio=$_POST{'fechaInicio'};
$fechaFin=$_POST{'fechaFin'};
$preguntas=$_POST['checkbox'];
$examen=new Examen($curso,$usuario,$numeroPreguntas,$fechaInicio,$fechaFin);
$examenDao=new ExamenDao();
$validador=$examenDao->registrarExamen($examen,$preguntas);
 if($validador==1){
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
          text: "Se ha registrado correctamente su examen",
          confirmButtonText: "Aceptar",
          showConfirmButton: true,
          allowOutsideClick: true
       }, function () {
          window.location.href = "../view/inicio.php";
       });
    </script>
    </html>
    <?php

 }
}

?>