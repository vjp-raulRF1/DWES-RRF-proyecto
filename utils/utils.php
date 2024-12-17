<?php

    function esOpcionMenuActiva(string $opcionMenu): bool {
        if ($_SERVER['REQUEST_URI'] === $opcionMenu) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Verifica si alguna de las opciones de menú en un array está activa.
     
     */
    function existeOpcionMenuActivaEnArray(array $opciones): bool {
        foreach ($opciones as $opcion) {
            if (esOpcionMenuActiva($opcion)) {
                return true;
            }
        }
        return false;
    }


    
    function mezclarPartners(array $partners){
        shuffle($partners);
        return  array_slice($partners,0,3);
    }
?>


