<?php

namespace proyecto\entities;

use proyecto\entities\repository\CategoriaRepository;
use proyecto\entities\repository\ImagenGaleriaRepository;

class PagesController{

    public function index(){
        $imagenGaleriaRepository = new ImagenGaleriaRepository();
        $imagenes = $imagenGaleriaRepository->findAll();
        $categoriaRepository = new CategoriaRepository();
        $categorias = $categoriaRepository->findAll();

        require_once '../views/index.view.php';
    }

    public function about(){
        
    }

}

?>