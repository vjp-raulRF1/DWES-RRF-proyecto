<?php
require_once 'entities/query_builder.class.php';

class CaregoriaRepository extends QueryBuilder
{

    public function __construct(string $table = 'categorias', string $classEntity = 'Categoria')
    {
        parent::__construct($table, $classEntity);
    }
}