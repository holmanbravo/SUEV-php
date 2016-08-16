<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
</head>
<body>
<?php session_start()?>
<?php if(isset($_SESSION['nombre']))
{
?>
<h1>Bienvenido de nuevo <?php echo $_SESSION['nombre'] ?></h1>
    <form action="../controller/UsuarioController.php">
    <input type="submit" value="Salir" /></form>
<?php
}else{
    header("Location: ../index.php");
}?>
</body>
</html>