<?php
// require_once 'entities/query_builder.class.php';
// require_once 'entities/categorias.class.php';
namespace proyecto\entities\repository;
    use proyecto\entities\QueryBuilder;
    use proyecto\entities\Categoria;
class CategoriaRepository extends QueryBuilder
{

    public function __construct(string $table = 'categorias', string $classEntity = Categoria::class)
    {
        parent::__construct($table, $classEntity);
    }
}