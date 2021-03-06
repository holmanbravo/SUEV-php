<?php

require_once dirname(__dir__) . '/utils/DbConnection.php';
require_once('Pregunta.php');
require_once('IPreguntaDao.php');
/**
 * Created by PhpStorm.
 * User: Sebastián Cardona
 * Date: 31/07/2016
 * Time: 12:05 AM
 */
class PreguntaDao implements IPreguntaDao
{

    private $conn=null;

    public function __construct()
    {
        $this->conn = DbConnection::connect();
    }

    /*public function getAll()
    {

        $result=array();
        $query="SELECT * FROM preguntas";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                $newQuestion = new Preguntas($row->idPregunta,$row->idCurso,$row->enunciado,$row->respuesta1,$row->respuesta2,$row->respuesta3,$row->respuesta4,$row->respuesta5,$row->correcta);
                $result[] = $newQuestion;
            }
            DbConnection::disconnect();
        } catch (PDOException $e) {
            echo "Revisa el siguiente error :" . $e->getMessage();
            DbConnection::disconnect();
        }
        return $result;
    }*/

    public function insertPreguntas(Pregunta $pre)
    {

        $salida = 0; //marcador para el resultado de la acci�n
        $query = "INSERT INTO preguntas(
           \"idCurso\", enunciado, respuesta1, respuesta2, respuesta3,
            respuesta4, respuesta5, correcta, estado)
    VALUES (?, ?, ?, ?, ?,
            ?, ?, ?, ?)";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $pre->getIdcurso(), PDO::PARAM_INT);
            $stmt->bindParam(2, $pre->getEnunciado(), PDO::PARAM_STR);
            $stmt->bindParam(3, $pre->getRespuesta1(), PDO::PARAM_STR);
            $stmt->bindParam(4, $pre->getRespuesta2(), PDO::PARAM_STR);
            $stmt->bindParam(5, $pre->getRespuesta3(), PDO::PARAM_STR);
            $stmt->bindParam(6, $pre->getRespuesta4(), PDO::PARAM_STR);
            $stmt->bindParam(7, $pre->getRespuesta5(), PDO::PARAM_STR);
            $stmt->bindParam(8, $pre->getCorrecta(), PDO::PARAM_INT);
            $stmt->bindParam(9, $pre->getEstado(), PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $salida = true;
            } else {
                $salida = false;
            }
            DbConnection::disconnect();
        }
        catch (PDOException $e) {
            $salida= " Revisa el siguiente error :" . $e->getMessage();
            DbConnection::disconnect();

        }
        return $salida;

    }

    public function consultarPreguntas($curso)
    {
        $preguntas=array();
        $sql="SELECT * FROM preguntas WHERE \"idCurso\"=?";
        $query = $this->conn->prepare($sql);
        $query->bindParam(1, $curso);
        $query->execute();
        foreach ($query as $row)
        {
            $preguntas[]=$row;
        }
        return $preguntas;
    }

    public function editarPreguntas(Pregunta $pre)
    {
        // TODO: Implement editarPreguntas() method.
    }

    public function eliminarPreguntas(Pregunta $pre)
    {
        // TODO: Implement eliminarPreguntas() method.
    }

    public function consultarPreguntas2(Pregunta $pre)
    {
        $preguntas=array();
        $sql="SELECT * FROM preguntas";
        $query = $this->conn->prepare($sql);
        $query->bindParam(1, $pre);
        $query->execute();
        foreach ($query as $row)
        {
            $preguntas[]=$row;
        }
        return $preguntas;
    }
}

?>