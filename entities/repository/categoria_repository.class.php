<?php
require_once 'entities/query_builder.class.php';
require_once 'entities/categorias.class.php';

class CategoriaRepository extends QueryBuilder
{

    public function __construct(string $table = 'categorias', string $classEntity = 'Categoria')
    {
        parent::__construct($table, $classEntity);
    }
}