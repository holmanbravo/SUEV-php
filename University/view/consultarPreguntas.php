<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta nam="viewport"
          content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <title>Examen Manual</title>
    <link rel="stylesheet" href="componentes/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="componentes/css/formValidation.css"/>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" href="componentes/css/sweetalert.css">
    <link href="componentes/css/datepicker.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<?php session_start() ?>
<?php if (isset($_SESSION['nombre']))
{
?>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img width="50" src="componentes/img/evaluacion2.png">
                </a>
            </div>
        </div>
    </nav>
<!-- menu-->
<nav class="navbar navbar-inverse navbar-static-top" style="margin-bottom:30px">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false"><span
                            class="glyphicon glyphicon-question-sign"></span> Preguntas<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="crearpreguntas.php">Crear Preguntas</a></li>
                        <li><a href="consultarPreguntas.php">Consultar Preguntas</a></li>
                    </ul>
                </li>
                <li><a href="crearCursos.php">Crear Cursos</a></li>
            </ul>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-haspopup="true" aria-expanded="false"><span
                                class="glyphicon glyphicon-folder-open"></span> Examen<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Registrar Examen Manual</a></li>
                            <li><a href="#">Registrar Examen Automático</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="text-align:right">
                    <li>
                        <form action="../controller/UsuarioController.php" method="post">

                            <form action="../controller/UsuarioController.php">
                                <button style="background-color: black;color:white;padding: 13px;width: auto"
                                        type="submit" name="btnSalir" value="Salir">Salir&nbsp;<span
                                        class="glyphicon glyphicon-off" style="color:white">
            </span></button>
                            </form>
                            <?php
                            } else {
                                header("Location: ../index.php");
                            } ?>

                        </form>
                    </li>
                </ul>
                <form class="navbar-form navbar-right">
                    <div style="color: white">
                        <h5>Bienvenido(a)&nbsp;<?php echo $_SESSION['nombre'] ?></h5>
                    </div>
                </form>


            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
</nav>


<script type="text/javascript" src="componentes/js/jquery.min.js"></script>
<script type="text/javascript" src="componentes/js/bootstrap.min.js"></script>
<script src="componentes/js/sweetalert.min.js"></script>
<script src="componentes/js/sweetalert-dev.js"></script>
<script src="componentes/js/bootstrap-datepicker.js" type="text/javascript"></script>
<?php require_once dirname(__dir__) . '/model/PreguntaDao.php';
$preguntaDao = new PreguntaDao();
$preguntas = $preguntaDao->consultarPreguntas2($preguntas);


    for ($i = 0; $i < sizeof($preguntas); $i++) {


        echo "<table style='margin: auto' width=\"90%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">\n";
        echo "<tr><td class=\"bgwhite10\" align =\"center\" width=\"10%\"><b> " . ($i + 1) . " </b></td>
			  <td colspan=5 align =\"center\"><b>" . $preguntas[$i]["enunciado"] . "<b></td></tr>\n
		  <tr valign=\"top\">
			  <td  width=\"20%\">a) " . $preguntas[$i]["respuesta1"] . "</td>
			  <td  width=\"20%\">b) " . $preguntas[$i]["respuesta2"] . "</td>
			  <td width=\"20%\">c) " . $preguntas[$i]["respuesta3"] . "</td>
			  <td  width=\"20%\">d) " . $preguntas[$i]["respuesta4"] . "</td>
			  <td  width=\"20%\">e) " . $preguntas[$i]["respuesta5"] . "</td>
			  <td ><input name=\"checkbox[]\" type=\"checkbox\" id=\"checkbox\" value=".$preguntas[$i]["idPregunta"]." /></td>
			  </tr>\n
			";
        echo "</table>\n";
        echo "<br>\n";

    }


    echo "<br/><input value=\"Registar\"  type=\"submit\" name=\"btnRegistrar\" id=\"registrar\" class=\"btn btn-primary\" style='margin-left: 89%;margin-bottom: 10px'/>";
    echo "</form>";

?>


</body>
</html>