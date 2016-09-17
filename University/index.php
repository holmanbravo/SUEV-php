<?php session_start() ?>
<?php if (isset($_SESSION['nombre'])) {
    header('Location:view/inicio.php');
} ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>Inicio Sesión</title>
    <meta name="viewport" content="width=device-width,user-scable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="view/componentes/css/estilos.css">
    <link rel="stylesheet" href="view/componentes/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="view/componentes/css/sweetalert.css">

    <link rel="stylesheet" href="view/componentes/css/formValidation.css"/>
    <script type="text/javascript" src="view/componentes/js/jquery.min.js"></script>
    <script type="text/javascript" src="view/componentes/js/formValidation.js"></script>
    <script type="text/javascript" src="view/componentes/js/framework/bootstrap.js"></script>
</head>
<body>
<!--<img src="view/img/Fondo1.JPG" height="200px" width="100%" style="margin-bottom: 20px">-->

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
                    <h3 class="panel-title user-row">
                        <img src="view/componentes/img/Computer.jpg" height="80px" width="80px">Bienvenido</h3>
                    <hr>
                </div>
                <form id="formulario" method="post" action="controller/UsuarioController.php" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-13 control-label" for="usuario"><font color="red" size="4">*</font>Usuario:</label>
                            <div class="col-md-13">
                                <input class="form-control " placeholder="Ingrese su usuario" id="usuario" name="usuario"
                                       type="text" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-13 control-label" for="contrasenia"><font color="red" size="4">*</font>Contraseña:</label>
                            <div  class="col-md-13">
                                <input class="form-control input-md" placeholder="Ingrese su contraseña" id="contrasena"
                                       name="contrasena" type="password" required="required">
                            </div>
                        </div>
                    </fieldset>
                    <br/>
                    <input class="btn btn-lg btn-success btn-block" id="iniciar" name="btnIniciar" type="submit"
                           value="Iniciar Sesión">
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
                contrasena: {
                    row: '.col-md-13',
                    validators: {

                        notEmpty: {

                            message: 'Por favor ingrese su contraseña, este campo no debe estar vacío'
                        }

                    }
                },

            }

        });


    });
    $('#iniciar').click(function () {

        if ($('#usuario').val() == '' || $('#contrasena').val() == '') {
            swal({
                type: "error",
                title: "¡No se puede iniciar sesión!",
                text: " Se deben llenar todos los campos",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                allowOutsideClick: true
            });
        }
    });</script>
<script type="text/javascript" src="view/componentes/js/bootstrap.min.js"></script>

<script src="view/componentes/js/sweetalert.min.js"></script>
<script src="view/componentes/js/sweetalert-dev.js"></script>

<!--require_once '/utils/DbConnection.php';

$conexion=DbConnection:: connect();

if(!$conexion){
echo'Hay un error';
}else{
echo'Todo bien';

}-->
</body>
</html>




