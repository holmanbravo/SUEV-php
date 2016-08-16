<?php
require_once dirname(__dir__ ) . '/model/UsuarioDao.php';
$controlador = new UsuarioDao();
if (isset($_REQUEST['btnIniciar']) && ($_REQUEST['btnIniciar']=='Iniciar Sesión') || ($_POST['usuario']) && isset($_POST['contrasena'])) {

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $validador=$controlador->iniciarSesion($usuario,$contrasena);
    if($validador == TRUE)
    {
        session_start();
        $_SESSION['nombre']=$usuario;
        header("Location:../view/inicio.php");
        exit;
    }
    else{?>
        <html>
        <link rel="stylesheet" href="../view/css/sweetalert.css">
        <script type="text/javascript" src="../view/js/jquery.min.js"></script>
        <script src="../view/js/sweetalert.min.js"></script>
        <script src="../view/js/sweetalert-dev.js"></script>
        <div/>
        <script type="text/javascript">
            swal({
                type: "error",
                title: "¡Credeciales Incorrectas!",
                text: "Usuario o contraseña invalida",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                allowOutsideClick: true
            },function(){window.location.href = "../index.php";});
        </script>
        </html>
        <?php

    }
}
if (isset($_REQUEST['btnSalir']) && ($_REQUEST['btnSalir']=='Salir')) {
    $controlador->cerrarSesion();
}

?>