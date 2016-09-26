<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consultar Registro Examen</title>
    <meta name="viewport" content="width=device-width,user-scable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" href="componentes/css/bootstrap.min.css">
    <link rel="stylesheet" href="componentes/css/bootstrap-table.min.css">
    <script src="componentes/js/jquery-1.12.0.min.js"></script>
    <script src="componentes/js/bootstrap.min.js"></script>
    <script src="componentes/js/bootstrap-table.min.js"></script>
    <script src="componentes/js/bootstrap-table-es-ES.min.js"></script>

</head>

<body>
<?php session_start()?>
<?php if(isset($_SESSION['nombre'])&& $_SESSION['rol']==1)
{
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img width="50"  src="componentes/img/evaluacion2.png">
            </a>
        </div>
    </div>
</nav>
<!-- menu-->
<nav class="navbar navbar-inverse navbar-static-top" style="margin-bottom:30px">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="inicio.php"><span class="glyphicon glyphicon-home"></span>  Inicio</a></li>
                <li class="dropdown"><a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-question-sign"></span>  Preguntas<span class="caret"></span></a><ul class="dropdown-menu">
                        <li><a href="crearpreguntas.php">Crear Preguntas</a></li>
                        <li><a href="consultarPreguntas.php">Consultar Preguntas</a></li>
                    </ul>
                </li>
                <li><a href="crearCursos.php">Crear Cursos</a></li>
            </ul>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-folder-open"></span> Examen<span class="caret"></span></a><ul class="dropdown-menu">
                            <li><a href="examenManual.php">Registrar Examen Manual</a></li>
                            <li><a href="#">Registrar Examen Automático</a></li>
                            <li><a href="consultarRegistroExamen.php">Consultar Registro Examen</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="text-align:right"><li>
                        <form action="../controller/UsuarioController.php" method="post">

                            <form action="../controller/UsuarioController.php">
                                <button style="background-color: black;color:white;padding: 13px;width: auto" type="submit" name="btnSalir" value="Salir">Salir&nbsp;<span class="glyphicon glyphicon-off" style="color:white" >
            </span></button>
                            </form>


                        </form>
                    </li></ul>
                <form class="navbar-form navbar-right">
                    <div style="color: white">
                        <h5>Bienvenido(a)&nbsp;<?php echo $_SESSION['nombre'] ?></h5>
                    </div>
                </form>


            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
</nav>
<div class="container panel" style="margin-bottom:80px">
    <table class="table table-striped" data-toggle="table" data-pagination="true" data-sort-name="Registro" data-search="true" data-sort-order="desc"  data-show-columns="true"  data-page-size="8" data-page-list="[4, 8, 16, 32, Todos]"><h3 style="text-align:center  ">Registro De Examenes</h3>
        <thead style="background-color:#006dcc">
        <tr>
            <th data-halign="center" data-align="center" data-sortable="true" data-field="Numero de solicitud">Clave De Examen</th>
            <th data-halign="center" data-align="center" data-sortable="true" data-field="Fecha de radicación" >Curso</th>
            <th data-halign="center" data-align="center" data-sortable="true" data-field="Tipo de solicitud" >Número de preguntas</th>
            <th data-halign="center" data-align="center" data-sortable="true" data-field="Fecha De Inicio" data-switchable="true">Fecha De Inicio</th>
            <th data-halign="center" data-align="center" data-sortable="true" data-field="Fecha Final" data-switchable="true">Fecha Final</th>
        </tr>
        </thead>
        <tbody>
        <?php require_once dirname(__dir__) . '/model/ExamenDao.php';
        require_once dirname(__dir__) . '/model/CursoDao.php';
        $examenDao=new ExamenDao();
        $examenes=$examenDao->consultarExamen($_SESSION['usuario']);
        $cursoDao=new CursoDao();
        for ($i = 0; $i < sizeof($examenes); $i++) {
          echo '

        <tr>
            <td>'.$examenes[$i]["idExamen"].'</td>
            <td>'.$cursoDao->consultarNombreCurso($examenes[$i]["codigoCurso"]).'</td>
            <td>'. $examenes[$i]["numeroPreguntas"].'</td>
            <td>'.$examenes[$i]["fechaInicio"].'</td>
            <td>'.$examenes[$i]["fechaFin"].'</td>
        </tr>';
             }?>
        </tbody>
    </table>

</div>
</body>
</html>
<?php
}else{
    header("Location: ../index.php");
}?>