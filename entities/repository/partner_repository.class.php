<?php
    require_once 'entities/query_builder.class.php';
    
    class PartnerRepository extends QueryBuilder {

        public function __construct(string $table='asociados', string $classEntity='Partner') {
            parent::__construct($table, $classEntity);
        }


        public function guardar(Partner $partner) {

            $fnGuardaAsociado = function () use ($partner) {
                $this->save($partner); 
            };
    
            $this->executeTransaction($fnGuardaAsociado);
        }
    }
?>