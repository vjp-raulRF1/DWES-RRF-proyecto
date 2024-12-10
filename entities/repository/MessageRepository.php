<?php
// require_once 'utils/const.php';
// require_once 'exceptions/query_exception.class.php';
// require_once 'entities/app.class.php';
// require_once 'entities/database/IEntity.class.php';
// require_once 'entities/partner.class.php';
//     require_once 'entities/query_builder.class.php';
namespace proyecto\entities\repository;

use proyecto\entities\QueryBuilder;
use proyecto\entities\Message;
use proyecto\entities\App;

class MessageRepository extends QueryBuilder
{

    public function __construct(string $table = 'mensajes', string $classEntity = 'Message')
    {
        parent::__construct($table, $classEntity);
    }


    public function guardar(Message $message)
    {
        // Aquí podrías manejar la transacción directamente
        $connection = App::getConnection(); // Iniciar la transacción
        $connection->beginTransaction();

        try {
            $this->save($message); // Guardar el mensaje
            $connection->commit(); // Confirmar la transacción
        } catch (\Exception $e) {
            $connection->rollBack();; // Revertir la transacción en caso de error
            throw $e; // Volver a lanzar la excepción si es necesario
        }
    }
}
?>