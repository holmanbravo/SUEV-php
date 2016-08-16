<?php
session_start();
require_once dirname(__dir__ ) . '/model/Usuario.php';
require_once dirname(__dir__ ) . '/model/UsuarioDao.php';

/**
 * Created by PhpStorm.
 * User: cristian
 */
class UsuarioController
{
    private $usuario;
    private $usuarioDao;
    private static $instancia;

    public function _construct(){
        $this->usuario=new Usuario();
        $this->usuarioDao=new UsuarioDao();


    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getUsuarioDao()
    {
        return $this->usuarioDao;
    }

    /**
     * @param mixed $usuarioDao
     */
    public function setUsuarioDao($usuarioDao)
    {
        $this->usuarioDao = $usuarioDao;
    }

    public static function singleton_login()
    {

        if (!isset(self::$instancia)) {

            $miclase = __CLASS__;
            self::$instancia = new $miclase;

        }

        return self::$instancia;

    }


    /*
     public function Index(){
        require_once 'view/header.php';
        require_once 'view/alumno/alumno.php';
        require_once 'view/footer.php';
    }
    */

    public function Crud(){
        $alm = new Alumno();

        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/alumno/alumno-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $usuario = new Usuario();

        $usuario->setIdusuario=$_POST['usuario'];
        $usuario->setContrasenia=$_POST['contrasenia'];


        $usuario->setIdusuario> 0
            ? $this->usuario->Actualizar($usuario)
            : $this->model->Registrar($usuario);

        header('Location: index.php');
    }

    public function iniciarSesion($usuario,$contrasena){
      $usuarioDao=new UsuarioDao();
      $validador=$usuarioDao->iniciarSesion($usuario,$contrasena);
        if($validador == TRUE)
        {

            header("Location:../view/home.php");
            exit;

        }
        else{
            echo 'credenciales incorrectas';
        }

    }

    public function x(){
        header('Location: index2.php');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
?>