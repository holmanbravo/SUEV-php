<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta nam="viewport"
          content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <title>Crear Preguntas</title>
    <link rel="stylesheet" href="componentes/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="componentes/css/sweetalert.css">
    <script src="componentes/js/jquery-1.12.0.min.js"></script>
    <script src="componentes/js/sweetalert.min.js"></script>
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

<?php require_once dirname(__dir__) . '/model/CursoDao.php';
$cursoDao = new CursoDao();
$cursos = $cursoDao->consultarCursoUsuario($_SESSION['usuario']);

?>
<div class="container">
    <div class="alert alert-success" role="alert">Ingrese la pregunta que desea crear, asociela a un curso y marque el
        punto correcto.
    </div>
    <form class="form-horizontal" id="commentForm" method="post" action="../controller/PreguntaController.php">
        <fieldset>
            <legend></legend>
            <label for="ccomment">Curso a Asociar</label>
            <select class="form-control" id="curso" name="curso">
                <option class="form-control" value="">Seleccione un curso</option>

                <?php
                for ($i = 0; $i < sizeof($cursos); $i++) {
                    echo "<option value='" . $cursos[$i]["codigo"] . "'>" . $cursos[$i]["nombre"] . "</option> ";
                }
                ?>
            </select>

            <p>
                <label for="ccomment">Enunciado</label>
                <textarea id="enun" name="enunciado" class="form-control" rows="3"
                          placeholder="What does SQL stand for?" required></textarea>
            </p>

            <p>
                <label for="pregunta1">Opcion 1</label>
                <input id="opcion1" name="opcion" type="radio" value="1"><input id="pregunta1"
                                                                                           name="respuesta1"
                                                                                           minlength="2" type="text"
                                                                                           class="form-control"
                                                                                           placeholder="Strong Question Language"
                                                                                           required></>
            </p>
            <p>
                <label for="pregunta2">Opcion 2</label>
                <input id="opcion2" name="opcion" type="radio" value="2"><input id="pregunta2"
                                                                                           name="respuesta2"
                                                                                           minlength="2" type="text"
                                                                                           class="form-control"
                                                                                           placeholder="Structured Question Language"
                                                                                           required></>
            </p>
            <p>
                <label for="pregunta3">Opcion 3</label>
                <input id="opcion3" name="opcion" type="radio" value="3"><input id="pregunta3" type="text"
                                                                                           minlength="2"
                                                                                           name="respuesta3"
                                                                                           class="form-control"
                                                                                           placeholder="Structured Query Language"
                                                                                           required></>
            </p>
            <p>
                <label for="pregunta4">Opcion 4</label>
                <input id="opcion4" name="opcion" type="radio" value="4"><input id="pregunta4" type="text"
                                                                                           minlength="2"
                                                                                           name="respuesta4"
                                                                                           class="form-control"
                                                                                           placeholder="Structured Query Language"
                                                                                           required></>
            </p>
            <p>
                <label for="pregunta5">Opcion 5</label>
                <input id="opcion5" name="opcion" type="radio" value="5"><input id="pregunta5" type="text"
                                                                                           minlength="2"
                                                                                           name="respuesta5"
                                                                                           class="form-control"
                                                                                           placeholder="Structured Query Language"
                                                                                           required></>
            <p>
                <input type="submit" class="btn btn-success" name="crear" id="btnc" value="Crear"/>

            </p>
        </fieldset>
    </form>
</div>
<script>
    $(document).ready(function () {
        $("#btnc").click(function () {
            var op1 = $("#pregunta1").val();
            var op2 = $("#pregunta2").val();
            var op3 = $("#pregunta3").val();
            var op4 = $("#pregunta4").val();
            var op5 = $("#pregunta5").val();
            var enun = $("#enun").val();

            if (enun != "" && op1 != "" && op2 != "" && op3 != "" && op4 != "" && op5 != "") {

                var a = 0, rdbtn = document.getElementsByName("opcion")
                for (i = 0; i < rdbtn.length; i++) {
                    if (rdbtn.item(i).checked == false) {
                        a++;
                    }
                }
                if (a == rdbtn.length) {
                    swal("Seleccione la respuesta que se debe guardar como correcta");
                    return false;
                }
            }
        });
    });
</script>
<script>
    $("#commentForm").validate();
</script>
<script>
    $('#btnc').click(function () {
        var indice=document.getElementById("curso").selectedIndex;
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
    });
</script>
<script type="text/javascript" src="componentes/js/bootstrap.min.js"></script>
</body>
</html>