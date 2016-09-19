<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="view/css/bootstrap.min.css" rel="stylesheet">
    <script src="view/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <h3>Nuestras preguntas</h3>

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
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Id Pregunta</th>
                <th>Id Curso</th>
                <th>Enunciado</th>
                <th>Respuesta No. 1</th>
                <th>Respuesta No. 2</th>
                <th>Respuesta No. 3</th>
                <th>Respuesta No. 4</th>
                <th>Respuesta No. 5</th>
                <th>Respuesta correcta</th>

            </tr>
            </thead>
            <tbody>

            <?php
            require_once ('model/PreguntaDao.php');
            //echo 'LLamado al Dao <br> ';
            $pdao = new PreguntasDao();
            $salida = $pdao->getAll();

            foreach ($salida as $obj) {
                echo '<tr>';
                echo '<td>' . $obj->getIdPregunta() . '</td>';
                echo '<td>' . $obj->getIdCurso() . '</td>';
                echo '<td>' . $obj->getEnunciado() . '</td>';
                echo '<td>' . $obj->getRespuesta1() . '</td>';
                echo '<td>' . $obj->getRespuesta2() . '</td>';
                echo '<td>' . $obj->getRespuesta3() . '</td>';
                echo '<td>' . $obj->getRespuesta4() . '</td>';
                echo '<td>' . $obj->getRespuesta5() . '</td>';
                echo '<td>' . $obj->getCorrecta() . '</td>';

                echo '</tr>';

            }


            DbConnection::disconnect();
            ?>


            </tbody>
        </table>
    </div>

    <div>

    </div>


</div> <!-- /container -->
</body>
</html>