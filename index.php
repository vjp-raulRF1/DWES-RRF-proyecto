<?php
require 'utils/utils.php';
require 'entity/image_galey.class.php';

$imagenesGaleria = [];
for ($i = 1; $i <= 12; $i++) {
    $imagenesGaleria[] = new ImagenGaleria("$i.jpg", "Descripción imagen $i", rand(0,5000), rand(0,5000), rand(0,5000));
}

require 'views/index.view.php';
