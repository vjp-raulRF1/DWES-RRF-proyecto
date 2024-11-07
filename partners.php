<?php
    require 'utils/utils.php';
    require 'entities/partners.class.php';
    
    $arrayPartners = [];
    for ($i=1; $i <=3 ; $i++) { 
        $partner = new Partners("Asociado $i", "log$i.jpg", "Imagen asocaido $i");
        array_push($arrayPartners, $partner);
    }
    if (sizeof($arrayPartners) > 3) {
        $arrayPartners = mezclarPartners($arrayPartners);
    }
    
    require 'views/partners.view.php';
?>