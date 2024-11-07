<?php
require_once 'utils/const.php';
require_once 'exceptions/query_exception.class.php';
require_once 'entities/app.class.php';
abstract class QueryBuilder
{

    /**
     * @var PDO c
     */
    private $connection;
    /**
     * @var string
     */
    private $table;
    /**
     * @var string
     */
    private $classEntity;

    public function __construct(string $table, string $classEntity)
    {
        $this->connection = App::getConnection();
        $this->table = $table;
        $this->classEntity = $classEntity;
    }

    public function findAll()
    {
        $sql = "SELECT * from $this->table"; //Sentencia SQL a ejecutar
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
            throw new QueryException(getErrorString(ERROR_EXECUTE_STATEMENT));
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    public function save(IEntity $entity): void {
        try {
            $parameters = $entity->toArray();
            $sql = sprintf(
                'insert into %s (%s) values (%s)',
                $this->table,
                implode(', ', array_keys($parameters)),
                ':' . implode(',:', array_keys($parameters))
            );
            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);
        } catch (PDOException $exception) {
            throw new  PDOException(getErrorString(ERROR_INS_BD));
        }
    }
}

?>