<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta nam="viewport"
          content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <title>Presentar Examen</title>
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
                <li><a href="inicio1.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false"><span
                            class="glyphicon glyphicon-folder-open"></span> Examen<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="presentarExamen.php">Presentar Examen</a></li>
                        <li><a href="#">Consultar Resultado</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="text-align:right">
                <li>
                    <form action="../controller/ExamenController.php" method="post">

                        <form action="../controller/UsuarioController.php">
                            <button style="background-color: black;color:white;padding: 13px;width: auto" type="submit"
                                    name="btnSalir" value="Salir">Salir&nbsp;<span class="glyphicon glyphicon-off"
                                                                                   style="color:white">
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
<div class="container" style="margin-top: 60px">

    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default login">
            <div class="panel-heading">
                <div class="row-fluid user-row">
                    <i class="fa fa-eye fa-3x"></i>
                </div>
                <h3 class="panel-title user-row">SUEV</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <h3 style="width: 80%">
                        <img src="componentes/img/Computer.jpg" height="80px" width="80px"> Bienvenido</h3>
                    <br/>
                </div>
                <form id="formulario" method="post" action="../controller/ExamenController.php"
                      enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-13 control-label" for="usuario"><font color="red" size="4">*</font>Usuario:</label>

                            <div class="col-md-13">
                                <input class="form-control " placeholder="Ingrese su usuario" id="usuario"
                                       name="usuario"
                                       type="text" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-13 control-label" for="contrasenia"><font color="red" size="4">*</font>Clave:</label>

                            <div class="col-md-13">
                                <input class="form-control input-md" placeholder="Ingrese la clave de su examen"
                                       id="clave"
                                       name="clave" type="password" required="required">
                            </div>
                        </div>
                    </fieldset>
                    <br/>
                    <button type="submit" id="empezar" name="btnEmpezar" value="Empezar"
                            class="btn btn-lg btn-primary btn-block">
                        <span class="glyphicon glyphicon-pencil"> Empezar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        // Generate a simple captcha


        $('#formulario').formValidation({

            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },

            fields: {
                usuario: {
                    row: '.col-md-13',
                    validators: {
                        notEmpty: {

                            message: 'Por favor ingrese su usuario,este campo no debe estar vacío'
                        }
                    }
                },
                clave: {
                    row: '.col-md-13',
                    validators: {

                        notEmpty: {

                            message: 'Por favor ingrese la clave de su examen, este campo no debe estar vacío'
                        }

                    }
                },

            }

        });


    });
    $('#empezar').click(function () {

        if ($('#usuario').val() == '' || $('#clave').val() == '') {
            swal({
                type: "error",
                title: "¡No se puede empezar el examen!",
                text: " Se deben llenar todos los campos",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                allowOutsideClick: true
            });
        }
    });</script>
<script type="text/javascript" src="componentes/js/bootstrap.min.js"></script>
<script src="componentes/js/sweetalert.min.js"></script>
<script src="componentes/js/sweetalert-dev.js"></script>
</body>
</html>