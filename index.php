<?php
require 'utils/utils.php';
require 'entity/image_gallery.class.php';
require 'entity/partners.class.php';

$imagenesGaleria = [];
for ($i = 1; $i <= 12; $i++) {
    $imagenesGaleria[] = new ImagenGaleria("$i.jpg", "Descripción imagen $i", rand(0, 5000), rand(0, 5000), rand(0, 5000));
}

$arrayPartners = [];
for ($i=1; $i <=3 ; $i++) { 
    $partner = new Partners("Asociado $i", "log$i.jpg", "Imagen asocaido $i");
    array_push($arrayPartners, $partner);
}
if (sizeof($arrayPartners) > 3) {
    $arrayPartners = mezclarPartners($arrayPartners);
}


require 'views/index.view.php';
?>