<?php
require_once dirname(__dir__) . '/model/Examen.php';
require_once dirname(__dir__) . '/model/ExamenDao.php';

session_start();
$examenDao = new ExamenDao();
if (isset($_REQUEST['btnAceptar']) && ($_REQUEST['btnAceptar'] == 'Aceptar') || isset($_POST['curso'])) {
   $curso = $_POST['curso'];
   $fechaInicio = $_POST['fechaInicio'];
   $fechaFin = $_POST{'fechaFin'};
   $validador = $examenDao->validarFechaExamen($fechaInicio);
   if ($validador == true) {
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
            title: "¡Fecha Examen!",
            text: "Ya se encuentra registrado un examen para esta fecha",
            confirmButtonText: "Aceptar",
            showConfirmButton: true,
            allowOutsideClick: true
         }, function () {
            window.location.href = "../view/examenManual.php";
         });
      </script>
      </html><?php

   } else {
      echo "<form name='form' action=\"../view/examenManual1.php\" method=\"post\">";
      echo "<input value=\"$curso\" name=\"curso\" style='visibility:hidden'/>";
      echo "<input value=\"$fechaInicio\" name=\"fechaInicio\" style='visibility:hidden'/>";
      echo "<input value=\"$fechaFin\" name=\"fechaFin\" style='visibility:hidden' />";
      echo "</form>";
      echo "<script>
            document.form.submit();
           </script>";
   }
}

if(isset($_REQUEST['btnRegistrar']) && ($_REQUEST['btnRegistrar'] == 'Registar') || isset($_POST['curso1']))  {
$curso = $_POST['curso1'];
$usuario=$_SESSION['usuario'];
$numeroPreguntas=sizeof($_POST['checkbox']);
$fechaInicio=$_POST{'fechaInicio'};
$fechaFin=$_POST{'fechaFin'};
$preguntas=$_POST['checkbox'];
$examen=new Examen($curso,$usuario,$numeroPreguntas,$fechaInicio,$fechaFin);
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
if(isset($_REQUEST['btnEmpezar']) && ($_REQUEST['btnEmpezar'] == 'Empezar') || isset($_POST['clave'])){
   $usuario=$_SESSION['usuario'];
   $usuario1=$_POST['usuario'];
   $clave=$_POST['clave'];


   if($usuario==$usuario1 ){
      $validador=$examenDao->validarExamen($usuario,$clave);
      if($validador==true){
         echo'Puede presentar el examen';
      }
      else{
         echo 'No esta disponible el examen en este momento';
      }


   }
   else{
      echo 'No son iguales';
   }

}
?>