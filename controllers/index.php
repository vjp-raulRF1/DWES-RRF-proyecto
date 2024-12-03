<?php
require_once 'utils/utils.php';
require_once 'entities/image_gallery.class.php';
require_once 'entities/partners.class.php';
require_once 'entities/connection.class.php';
require_once 'entities/repository/image_gallery_repository.class.php';
require_once 'entities/repository/partner_repository.class.php';

$errores = [];

try {

    
    $imagenRepository = new ImagenGaleriaRepository();
    
    $imagenesGaleria = $imagenRepository->findAll();
}
catch (QueryException | AppException $exception) {
    
    $errores[] = $exception->getMessage();
}

try {
 
    $partnerRepository = new PartnerRepository();

    
    $partners = $partnerRepository->findAll();
}
catch (FileException | QueryException | AppException $exception) {
    
    $errores[] = $exception->getMessage();
}



  
require 'views/index.view.php';
?>