<?php
return [
    'database' =>
    [
        'name' => 'proyecto', //nombre BD
        'username' => 'userproyecto',
        'password' => '1234',
        'connection' => 'mysql:host=dwes.local', //Configuración de la conexión
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ]
    ]
];
?>