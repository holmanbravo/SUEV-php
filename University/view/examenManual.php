<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta nam="viewport"
          content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <title>Examen Manual</title>
    <link rel="stylesheet" href="componentes/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="componentes/css/sweetalert.css">
    <link rel="stylesheet" href="componentes/css/bootstrap-datetimepicker.min.css"/>

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
                        <li><a href="#">Consultar Preguntas</a></li>
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
                            <li><a href="examenManual.php">Registrar Examen Manual</a></li>
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
<?php require_once dirname(__dir__) . '/model/CursoDao.php';
$cursoDao = new CursoDao();
$cursos = $cursoDao->consultarCursoUsuario($_SESSION['usuario']);

?>
<form class="form-inline" style="width: 100%" action="../controller/ExamenController.php" method="post">
    <div class=" form-group">
        <label class="col-md-1" style="width:10%;margin-left: 10%"><font color="red" size="4">*</font>Curso:</label>
        <select class="form-control col-md-2" id="opciones" name="curso">
            <option class="form-control" value="">Seleccione un curso</option>
            <?php
            for ($i = 0; $i < sizeof($cursos); $i++) {
                echo "<option value='" . $cursos[$i]["codigo"] . "'>" . $cursos[$i]["nombre"] . "</option> ";
            }
            ?>
        </select>

        <div class="container">
            <label class="col-md-2" style="width:13%"><font color="red" size="4">*</font>Fecha De
                Inicio:</label>

            <div class="col-md-2">
                <input id="fechaInicio" type="text" name="fechaInicio" class=" input-md"  placeholder="Seleccione fecha y hora ">
            </div>
            <label class="col-md-3 control-label" style="width:13%"><font color="red" size="4">*</font>Fecha
                Final:</label>

            <div class="col-md-2">
                <input id="fechaFin" type="text" name="fechaFin" class="input-md" placeholder="Seleccione fecha y hora ">
            </div>
        </div>
    </div>
    <br/>
    <input type="submit" id="aceptar" name="btnAceptar" value="Aceptar" class="btn btn-primary" style="margin-left: 10%;margin-top: 1%"/>
</form>

<script type="text/javascript" src="componentes/js/jquery.min.js"></script>
<script type="text/javascript" src="componentes/js/bootstrap.min.js"></script>
<script src="componentes/js/sweetalert.min.js"></script>
<script src="componentes/js/sweetalert-dev.js"></script>
<script type="text/javascript" src="componentes/js/moment-with-locales.min.js"></script>
<script type="text/javascript" src="componentes/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $('#aceptar').click(function () {
          var indice=document.getElementById("opciones").selectedIndex;
        if (indice==null || indice==0) {
            swal({
                type: "error",
                title: "¡Se debe seleccionar un curso!",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                allowOutsideClick: true
            });
            return false;
       }
        if ($('#fechaInicio').val() === '' || $('#fechaFin').val() === '') {
            swal({
                type: "error",
                title: "¡No se puede registrar el examen!",
                text: " Se debe seleccionar la fecha inicio y fecha final del examen",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                allowOutsideClick: true
            });
            return false;
        }
    });
</script>

<script type="text/javascript">

    $(function () {
        $('#fechaInicio').datetimepicker({locale: 'es'});
        $('#fechaFin').datetimepicker({
            locale: 'es',
            useCurrent: false //Important! See issue #1075
        });
        $("#fechaInicio").on("dp.change", function (e) {
            $('#fechaFin').data("DateTimePicker").minDate(e.date);
        });
        $("#fechaFin").on("dp.change", function (e) {
            $('#fechaInicio').data("DateTimePicker").maxDate(e.date);
        });
    });


</script>


</body>
</html>