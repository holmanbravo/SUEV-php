<?php

require_once dirname(__dir__) . '/utils/DbConnection.php';
require_once('Usuario.php');
require_once('IUsuarioDao.php');

/**
 * Created by PhpStorm.
 * User: cristian
 */
class UsuarioDao implements IUsuarioDao
{
    private $conn = null;


    public function __construct()
    {
        $this->conn = DbConnection::connect();
    }

    public function getAll()
    {
        $result = array();
        $sql = "SELECT idUsuario, identificacion
				FROM usuarios";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                $newUser = new Usuario($row->idUsuario, $row->identificacion);
                $result[] = $newUser;
            }
            DbConnection::disconnect();
        } catch (PDOException $e) {
            echo "Revisa el siguiente error :" . $e->getMessage();
            DbConnection::disconnect();
        }
        return $result;
    }

    public function iniciarSesion($usuario, $contrasenia)
    {

        try {

            $sql = "SELECT * FROM usuarios WHERE idUsuario=? AND contrasenia=?";
            $query = $this->conn->prepare($sql);
            $query->bindParam(1, $usuario);
            $query->bindParam(2, $contrasenia);
            $query->execute();


            //si existe el usuario
            if ($query->rowCount() == 1) {
                return $this->verificarRol($usuario);

            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
        }


    }

    public function verificarRol($usuario)
    {
        $sql = "SELECT  \"idRol\" FROM usuarios u
                JOIN rolesusuarios ru
                ON  u.idUsuario=ru.\"idUsuario\" WHERE u.idUsuario=?";
        $query = $this->conn->prepare($sql);
        $query->bindParam(1, $usuario);
        $query->execute();
        while ($row = $query->fetch()) {
            return $row[0];
        }


    }

    public function consultarNombre($usuario)
    {
        $sql = "SELECT CONCAT(\"primerNombre\",' ',\"primerApellido\") FROM datospersonales d
       JOIN usuarios u ON d.identificacion=u.identificacion WHERE u.idusuario=?";
        $query = $this->conn->prepare($sql);
        $query->bindParam(1, $usuario);
        $query->execute();
        while ($row = $query->fetch()) {
            return $row[0];
        }
    }

    public function cerrarSesion()
    {
        session_start();
        unset($_SESSION['nombre']);
        unset($_SESSION['usuario']);
        unset($_SESSION['rol']);

        session_destroy();
        header("Location:../index.php");
    }
}

?>