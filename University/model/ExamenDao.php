<?php
require_once dirname(__dir__) . '/utils/DbConnection.php';
require_once('Examen.php');
require_once('IExamenDao.php');

class ExamenDao implements IExamenDao
{
    private $conn = null;

    /**
     * ExamenDao constructor.
     * @param null $conn
     */
    public function __construct()
    {
        $this->conn = DbConnection::connect();
    }


    public function registrarExamen(Examen $examen, array $preguntas)
    {
        $query = "INSERT INTO examenes(
              \"codigoCurso\", \"idUsuarioCreacion\", \"numeroPreguntas\",
             \"fechaInicio\", \"fechaFin\")
               VALUES ( ?, ?, ?, ?, ?)";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $examen->getCodigoCurso(), PDO::PARAM_INT);
            $stmt->bindParam(2, $examen->getUsuarioCreacion(), PDO::PARAM_STR);
            $stmt->bindParam(3, $examen->getNumeroPreguntas(), PDO::PARAM_INT);
            $stmt->bindParam(4, $examen->getFechaInicio(), PDO::PARAM_STR);
            $stmt->bindParam(5, $examen->getFechaFin(), PDO::PARAM_STR);
            $stmt->execute();

            $idExamen=0;
            $idExamen=$this->consultarIdExamen();
            foreach ($preguntas as $preguntas1) {
                $query1 = "INSERT INTO preguntasexamen(
            \"idExamen\", \"idPregunta\")
           VALUES ($idExamen,$preguntas1)";
                $stmt1 = $this->conn->prepare($query1);
                $stmt1->execute();
            }

            if ($stmt->rowCount() > 0) {
                $salida = true;
            } else {
                $salida = false;
            }
            DbConnection::disconnect();
        } catch (PDOException $e) {
            $salida = " Revisa el siguiente error :" . $e->getMessage();
            DbConnection::disconnect();

        }
        return $salida;
    }


    public function consultarIdExamen()
    {
        $sql = "SELECT CAST( MAX(\"idExamen\") AS INT) FROM examenes";
        $query = $this->conn->prepare($sql);
        $query->execute();
        while ($row = $query->fetch()) {
            return $row[0];
        }


    }

    public function validarFechaExamen($fechaInicio){
        $sql="SELECT \"idExamen\" FROM examenes WHERE (SELECT DATE(\"fechaInicio\"))=? OR (SELECT DATE(\"fechaFin\"))=?";
        $query = $this->conn->prepare($sql);
        $query->bindParam(1, $fechaInicio);
        $query->bindParam(2, $fechaInicio);
        $query->execute();
        if ($query->rowCount() == 1) {
            return true;
        }
        else{
            return false;
        }
    }
}

?>