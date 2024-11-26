<?php
require_once 'utils/const.php';
require_once 'exceptions/query_exception.class.php';
require_once 'entities/app.class.php';
require_once 'entities/database/IEntity.class.php';
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
    private function executeQuery (string $sql): array {
        //Una posibilidad que tenemos para ejecutar esta consulta el método query de la clase PDO:
        //$this -> connection->query($sql);
        //El problema de query es el mismo que el de exec, es vulnerable a ataques SQLInyection
        //por lo que mejor vamos a usar prepare quee me devolvera un pdoStatement
        $pdoStatement = $this-> connection->prepare($sql);
        //una vez que tengo el pdoStatement ya puedo hacer el execute
        //Como la sentencia SQL no tiene parámetros, no es necesario pasarle nada al método execute
        if ($pdoStatement->execute() === false) {
            throw new QueryException( "No se ha podido ejecutar la consulta");
        }
        return $pdoStatement->fetchAll(PDO:: FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }
    /**
     * @param string $table
     *
     * @param string $classEntity
     * @return array
     * @throws QueryException
     */
    public function findAll(): array{
        $sql = "SELECT * from $this->table"; //Sentencia SQL a ejecutar
        return $this->executeQuery($sql);
    }
    public function find (int $id): IEntity {
        $sql = "SELECT * from $this->table WHERE id=$id"; //Sentencia SQL a ejecutar
        $result = $this->executeQuery($sql);
        if (empty($result)) {
            throw new NotFoundException("No se ha encontrado ningún elemento con id $id");
        }
        return $result[0];
    }
    public function executeTransaction (callable $fnExecuteQuerys) {
        try {
            $this->connection->beginTransaction();
            $fnExecuteQuerys(); //Llamo al callable para que ejecute todas
            //las operaciones que sean necesarias realizar
            $this->connection->commit(); //Para confirmar las operaciones pendientes y ejecutar.
        } catch (PDOException $pdoException) {
            $this->connection->rollBack(); //Deshace todos los cambios desde el beginTransaction
            throw new QueryException('No se ha podido realizar la operación');
        }
    }
    public function save(IEntity $entity): void {
        $parameters = $entity->toArray();
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $this->table,
            implode(', ', array_keys($parameters)),
            ':' . implode(',:', array_keys($parameters))
        );
        try {
        $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);
            if ($entity instanceof ImagenGaleria) {
                $this->incrementarCategoria($entity->getCategoria());
            }
        } catch (PDOException $exception) {
            throw new  PDOException(getErrorString(ERROR_INS_BD));
        }
    }

    public function incrementarCategoria(int $categoria){
        try{
        $this->connection->beginTransaction();
        $sql = sprintf(`UPDATE categorias SET numImagenes=numImagenes+1 WHERE id=$categoria`);
        $this->connection->exec($sql);
        $this->connection->commit();
        } catch(Exception $exception){
            $this->connection->rollBack();
            throw new Exception($exception->getMessage());
        }
    }

}

?>