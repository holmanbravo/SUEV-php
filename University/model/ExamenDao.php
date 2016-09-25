<?php
require_once dirname(__dir__) . '/utils/DbConnection.php';
require_once dirname(__dir__) . '/services/EmailService.php';
require_once('Examen.php');
require_once('IExamenDao.php');

class ExamenDao implements IExamenDao
{
    private $conn = null;
    private $emailService;

    /**
     * ExamenDao constructor.
     * @param null $conn
     */
    public function __construct()
    {
        $this->conn = DbConnection::connect();
        $this->emailService=new EmailService();
    }

    /**
     * @return EmailService
     */
    public function getEmailService()
    {
        return $this->emailService;
    }

    /**
     * @param EmailService $emailService
     */
    public function setEmailService($emailService)
    {
        $this->emailService = $emailService;
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

            $idExamen=$this->consultarIdExamen();

            foreach ($preguntas as $preguntas1) {
                $query1 = "INSERT INTO preguntasexamen(
            \"idExamen\", \"idPregunta\")
           VALUES ('$idExamen',$preguntas1)";
                $stmt1 = $this->conn->prepare($query1);
                $stmt1->execute();
            }

            $correos=$this->notificarExamen($idExamen);
            $examen=$this->consultarFechas($idExamen);
            for($i = 0; $i < sizeof($examen); $i++){
                $fechaInicio=$examen[$i]["fechaInicio"];
                $fechaFin=$examen[$i]["fechaFin"];
            }
            $this->emailService->enviarCorreo($correos,$fechaInicio,$fechaFin,$idExamen);

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

        $sql = "SELECT MAX(\"idExamen\") FROM examenes";
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

    public function  validarExamen($usuario,$clave){
           $sql="SELECT DISTINCT(\"idExamen\") FROM examenes e
                 JOIN cursosusuarios cu
                 ON  e.\"codigoCurso\"=cu.\"codigoCurso\" JOIN usuarios u
                 ON cu.identificacion=u.identificacion WHERE
                (SELECT NOW()::timestamp) BETWEEN (\"fechaInicio\"::timestamp) AND (\"fechaFin\"::timestamp) AND
                 u.idusuario=? AND e.\"idExamen\"=?";
           $query = $this->conn->prepare($sql);
           $query->bindParam(1, $usuario);
           $query->bindParam(2, $clave);
           $query->execute();
           if ($query->rowCount() == 1) {
            return true;
           }
           else{
            return false;
           }
    }

    public function notificarExamen($idExamen){
        $correos=array();
        $sql="SELECT  \"correoElectronico\"  FROM datospersonales d
              JOIN  cursosusuarios cu ON d.identificacion=cu.identificacion JOIN especialidadesusuarios eu
              ON NOT cu.identificacion=eu.identificacion WHERE cu.\"codigoCurso\"=(SELECT \"codigoCurso\" FROM examenes
              WHERE \"idExamen\"=?);";
        $query = $this->conn->prepare($sql);
        $query->bindParam(1, $idExamen);
        $query->execute();
        foreach ($query as $row)
        {
            $correos[]=$row;
        }
        return $correos;
    }

    public function consultarFechas($idExamen){
        $fechas=array();
        $sql="SELECT \"fechaInicio\",\"fechaFin\" FROM examenes WHERE \"idExamen\"=?;";
        $query = $this->conn->prepare($sql);
        $query->bindParam(1, $idExamen);
        $query->execute();
        foreach ($query as $row)
        {
            $fechas[]=$row;
        }
        return $fechas;
    }
}

?>