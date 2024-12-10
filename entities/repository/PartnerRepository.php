<?php
    // require_once 'entities/query_builder.class.php';
    namespace proyecto\entities\repository;
    use proyecto\entities\QueryBuilder;
    use proyecto\entities\Partner;
    use proyecto\entities\App;
    
    class PartnerRepository extends QueryBuilder {

        public function __construct(string $table='asociados', string $classEntity='Partner') {
            parent::__construct($table, $classEntity);
        }

        public function guardar(Partner $partner) {
            // Aquí podrías manejar la transacción directamente
            $connection = App::getConnection(); // Iniciar la transacción
            $connection->beginTransaction();
        
            try {
                $this->save($partner); // Guardar el mensaje
                $connection->commit(); // Confirmar la transacción
            } catch (\Exception $e) {
                $connection->rollBack();; // Revertir la transacción en caso de error
                throw $e; // Volver a lanzar la excepción si es necesario
            }
        }
    }
?>