<?php
require_once 'entities/query_builder.class.php';

class ImagenGaleriaRepository extends QueryBuilder
{

    public function __construct(string $table = 'imagenes', string $classEntity = 'ImagenGaleria')
    {
        parent::__construct($table, $classEntity);
    }

    public function getCategoria(ImagenGaleria $imagenGaleria): Categoria
    {
        $categoriaRepository = new CaregoriaRepository();
        return $categoriaRepository->find($imagenGaleria->getCategoria());
    }


}
?>