<?php

require_once dirname(__dir__) . '/utils/DbConnection.php';
require_once ('ICursoDao.php');
require_once ('Curso.php');
/**
 * Created by PhpStorm.
 * User: Holman Bravo
 * Date: 09/08/2016
 * Time: 9:52 PM
 */

class CursoDao implements ICursoDao
{
    private $conn=null;


    public function __construct()
    {
        $this->conn = DbConnection::connect();
    }


   public function insertCursos(Curso $cur)
   {


      try {
       $query = " INSERT INTO cursos(codigo,nombre,idespecialidad)
                 VALUES (nextval('curso_seq'),?,?)";

       $stmt = $this->conn->prepare($query);

      // $stmt->bindParam(1, $cur->getCodigo(),PDO::PARAM_STR );
       $stmt->bindParam(1, $cur->getNombre(), PDO::PARAM_STR);
       $stmt->bindParam(2, $cur->getIdespecialidad(), PDO::PARAM_INT);
          $stmt->execute();


       if ($stmt->rowCount() > 0) {
           $salida = 'Registro guardado exitosamente';
       } else {
           $salida = 'No se pudo guardar el registro. Consulte al administrador';
       }
                 DbConnection::disconnect();
   }
            catch (PDOException $e) {
            $salida= " Revisa el siguiente error :" . $e->getMessage();
            DbConnection::disconnect();

                }


    }

    public function consutarCurso()
    {

                    $result=array();
                    $queryConsulta="SELECT c.codigo,c.nombre,e.nombreespecialidad AS idespecialidad
                                    FROM cursos c
                                    INNER JOIN especialidades e
                                    ON e.idespecialidad=c.idespecialidad
                                    ORDER BY c.codigo ASC
";
            try {

                $stmt = $this->conn->prepare($queryConsulta);
                $stmt->execute();

                foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                    $newCurso = new Curso($row->codigo, $row->nombre,$row->idespecialidad);
                    $result[] = $newCurso;
                }
                DbConnection::disconnect();
            }
            catch (PDOException $e) {
                echo "Revisa el siguiente error :" . $e->getMessage();
                DbConnection::disconnect();
            }
        return $result;
    }

    public function contarcursos(){


        $queryContador="select count(*)+1 from cursos";
        try {


            $stmts = $this->conn->prepare($queryContador);

            $num=$stmts->execute();

            DbConnection::disconnect();
        }
        catch (PDOException $e) {
            echo "Revisa el siguiente error :" . $e->getMessage();
            DbConnection::disconnect();
        }
        return $num;

    }


    public function consultarCursoUsuario($usuario)
    {   $cursos=array();
        $sql = "SELECT codigo,nombre FROM cursos c JOIN cursosusuarios cu
                ON c.codigo=cu.\"codigoCurso\" JOIN usuarios u ON  cu.identificacion=u.identificacion
                WHERE u.idusuario=?";
        $query = $this->conn->prepare($sql);
        $query->bindParam(1, $usuario);
        $query->execute();
        foreach ($query as $row)
        {
            $cursos[]=$row;
        }
        return $cursos;
    }
}

?>