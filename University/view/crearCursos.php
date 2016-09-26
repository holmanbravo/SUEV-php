<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta nam="viewport"
          content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <title>Crear Curso</title>
    <link rel="stylesheet" href="componentes/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="componentes/css/sweetalert.css">
    <link rel="stylesheet" href="componentes/css/formValidation.css"/>
    <script type="text/javascript" src="componentes/js/jquery.min.js"></script>
    <script type="text/javascript" src="componentes/js/formValidation.js"></script>
    <script type="text/javascript" src="componentes/js/framework/bootstrap.js"></script>
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
                            <li><a href="examenManual.php">Registrar Examen Manual</a></li>
                            <li><a href="#">Registrar Examen Automático</a></li>
                            <li><a href="consultarRegistroExamen.php">Consultar Registro Examen</a></li>
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


<form class="container btn-group" action="../controller/CrearCursos.php" method="post">
    <div class="col-sm-6">
        <div class="col-sm-4">

            <?php

            //En esta funcionalidad solo se recoge una variable pasada por get y se pinta de dos colores
            //Es ilustrativo. La ide es mejorar usando los recursos para ello.

            if (isset($_GET['msg'])) {
                if (isset($_GET['c']) && $_GET['c'] != 1) {
                    ?>
                    <div style="color: green;">
                        <?php echo $_GET['msg'];
                        ?>
                    </div>
                    <?php
                } else {

                    ?>
                    <div style="color: red;">
                        <?php echo $_GET['msg'];
                        ?>
                    </div>
                    <?php
                }

            }
            ?>


        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Especialidad</th>
            </tr>
            </thead>
            <tbody>

            <?php
            require_once('../model/CursoDao.php');
            //echo 'LLamado al Dao <br> ';
            $pdao = new CursoDao();
            $salida = $pdao->consutarCurso();


            foreach ($salida as $obj) {
                echo '<tr>';
                echo '<td>' . $obj->getCodigo() . '</td>';
                echo '<td>' . $obj->getNombre() . '</td>';
                echo '<td>' . $obj->getIdEspecialidad() . '</td>';
            }
            DbConnection::disconnect();
            ?>
            </tbody>
        </table>
    </div>
    </div>


    <div class="col-sm-5" style="margin: 30px">
        <div class="alert alert-success" role="alert">Ingrese los cursos que desea crear....por medio del check puede
            borrar los registros
        </div>

        <TABLE class="table" id="dataTable" width="350px" border="1">
            <TR>
                <TD><INPUT type="text" name="nombre"
                           placeholder="Nombre del Curso" required maxlength="30"/></TD>
                <TD><select class="form-control" name="idespecialidad">
                        <option value="2">Complementaria</option>
                        <option value="1">Tecnica</option>
                    </select>
                </TD>
            </TR>


        </TABLE>
        <input type="submit" class="btn btn-success" name="crear" id="btnc" value="Crear"/>
    </div>
    </div>
</form>


<SCRIPT language="javascript">
    function addRow(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        var cell1 = row.insertCell(0);
        var element1 = document.createElement("input");
        element1.type = "checkbox";
        cell1.appendChild(element1);
        var cell2 = row.insertCell(1);
        var element2 = document.createElement("input");
        element2.type = "text";
        cell2.appendChild(element2);
        var cell3 = row.insertCell(2);
        var myarray = new Array(3)
        myarray[0] = "Complementaria"
        myarray[1] = "Técnica"
        var element3 = document.createElement("select");
        element3.name = '$idespecialidad' + 3;
        for (i = 0; i < 3; i++) {
            opt = document.createElement('option');
            opt.value = i;
            opt.innerHTML = myarray[i];
            element3.appendChild(opt);
        }

        element3.type = "text";
        cell3.appendChild(element3);
        /*
         element3.type = "text";
         cell3.appendChild(element3);*/

    }
    function deleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            for (var i = 0; i < rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if (null != chkbox && true == chkbox.checked) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
        } catch (e) {
            alert(e);
        }
    }
</SCRIPT>

<script type="text/javascript" src="componentes/js/bootstrap.min.js"></script>
</body>
</html>