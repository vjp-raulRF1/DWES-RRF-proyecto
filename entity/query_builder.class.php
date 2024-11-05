<?php
require_once 'utils/const.php';
require_once 'exceptions/query_exception.class.php';
class QueryBuilder
{

    /**
     * @var PDO c
     */
    private $connection;

    /**
     * @param PDO $conection 
     */
    public function __construct(PDO $conection)
    {
        $this->connection = $conection;
    }

    public function findAll(string $table, string $classEntity)
    {
        $sql = "SELECT * from $table"; //Sentencia SQL a ejecutar
        //Una posibilidad que tenemos para ejecutar esta consulta es
        //el método query de la clase PDO:
        //$this->connection->query($sql);
        //El problema de query es el mismo que el de exec, es vulnerable
        //a ataques SQLInyection por lo que mejor vamos a usar prepare
        //que me devolvera un pdoStatement
        $pdoStatement = $this->connection->prepare($sql);
        //una vez que tengo el pdoStatement ya puedo hacer el execute
        //Como la sentencia SQL no tiene parámetros, no es necesario
        //pasarle nada al método execute
        if ($pdoStatement->execute() === false) {
            $mensajeError = getErrorString($pdoStatement['error']);

            throw new FileException($mensajeError);
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,$classEntity);
    }
}
