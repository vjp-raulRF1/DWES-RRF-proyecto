<?php
// require_once 'entities/query_builder.class.php';
namespace proyecto\entities\repository;
use proyecto\entities\QueryBuilder;
class ImagenGaleriaRepository extends QueryBuilder
{

    public function __construct(string $table = 'imagenes', string $classEntity = 'ImagenGaleria')
    {
        parent::__construct($table, $classEntity);
    }




}
?>