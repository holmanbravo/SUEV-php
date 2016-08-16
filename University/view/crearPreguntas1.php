

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Crear Preguntas</h3>
            <hr>

        </div>

        <form class="form-horizontal" action="../controller/PreguntasController.php" method="post">

            <div class="control-group ">
                <label class="control-label">Id Pregunta</label>
                <div class="controls">
                    <input name="idPregunta" type="text"  placeholder="Sólo un número" value="">

                    <span class="help-inline"> </span>

                </div>
            </div>


            <div class="control-group">
                <label class="control-label">Id Curso</label>
                <div class="controls">
                    <input name="idCurso" type="text"  placeholder="Sólo un número" value="">

                    <span class="help-inline"> </span>

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Enunciado</label>
                <div class="controls">
                    <input name="enunciado" type="text"  placeholder="campo de texto" value="">

                    <span class="help-inline"> </span>

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Respuesta No. 1</label>
                <div class="controls">
                    <input name="respuesta1" type="text"  placeholder="Campo de texto" value="">

                    <span class="help-inline"> </span>

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Respuesta No. 2</label>
                <div class="controls">
                    <input name="respuesta2" type="text"  placeholder="Campo de texto" value="">

                    <span class="help-inline"> </span>

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Respuesta No. 3</label>
                <div class="controls">
                    <input name="respuesta3" type="text"  placeholder="Campo de texto" value="">

                    <span class="help-inline"> </span>

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Respuesta No. 4</label>
                <div class="controls">
                    <input name="respuesta4" type="text"  placeholder="Campo de texto" value="">

                    <span class="help-inline"> </span>

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Respuesta No. 5</label>
                <div class="controls">
                    <input name="respuesta5" type="text"  placeholder="Campo de texto" value="">

                    <span class="help-inline"> </span>

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Respuesta correcta</label>
                <div class="controls">
                    <input name="correcta" type="text"  placeholder="Sólo un número" value="">

                    <span class="help-inline"> </span>

                </div>
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" name="btncreate" id="btnc" value="Create" />

                <!--
                 <button type="submit" class="btn btn-success" id="btn">Create</button>
                                          <a class="btn btn-modalbox" href="../index.php">Back</a>
                -->

            </div>
        </form>
    </div>

</div> <!-- /container -->
</body>
</html>