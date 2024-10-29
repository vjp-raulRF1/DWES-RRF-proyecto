<?php

$partners = [];
$contador = 1;

    function generarPartners(){
        $partners = new Partners("asociado".$contador,"log".$contador,"imagen asociado".$contador);


    }
?>