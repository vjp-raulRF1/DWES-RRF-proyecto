<?php

namespace proyecto\utils;

define("ERROR_MV_UP_FILE", 9);
define("ERROR_EXECUTE_STATEMENT", 10);
define("ERROR_APP_CORE", 11);
define("ERROR_CON_BD", 12);
define("ERROR_INS_BD", 13);

$uploadErrors = array(
    'UPLOAD_ERR_OK' => 0,
    'UPLOAD_ERR_INI_SIZE' => 1,
    'UPLOAD_ERR_FORM_SIZE' => 2,
    'UPLOAD_ERR_PARTIAL' => 3,
    'UPLOAD_ERR_NO_FILE' => 4,
    'UPLOAD_ERR_NO_TMP_DIR' => 6,
    'UPLOAD_ERR_CANT_WRITE' => 7,
    'UPLOAD_ERR_EXTENSION' => 8,
    'ERROR_MV_UP_FILE' => 9,
    'ERROR_EXECUTE_STATEMENT' => 10,
    'ERROR_APP_CORE' => 11,
    'ERROR_CON_BD' => 12,
    'ERROR_INS_BD' => 13
);

function getErrorString($uploadErrors) {
    return match($uploadErrors) {
        0 => 'No hay errores',
        1 => 'El archivo subido excede el tamaño máximo permitido por la directiva upload_max_filesize en php.ini.',
        2 => 'El archivo subido excede el tamaño máximo permitido por la directiva MAX_FILE_SIZE en el formulario HTML.',
        3 => 'El archivo fue solo parcialmente subido.',
        4 => 'No se subió ningún archivo.',
        6 => 'Falta la carpeta temporal.',
        7 => 'No se pudo escribir el archivo en el disco.',
        8 => 'Una extensión de PHP detuvo la carga del archivo.',
        9 => 'No se ha podido mover el archivo de destino.',
        10 => 'No se ha podido ejecutar la consulta',
        11 => '"No se ha encontrado la clave en el contenedor"',
        12 => '"No se ha podido crear la conexión a la base de datos"',
        13 => '"Error al insertar en la BD"',
        default => 'Error desconocido.'
    };
}

?>