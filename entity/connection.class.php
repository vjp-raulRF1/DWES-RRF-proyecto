<?php
class Connection {
  public static function make() {
    $options = [
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //para que utilice utf8
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //para cuando se produzca un error
      //se genere una excepción y así poder capturarla
      PDO::ATTR_PERSISTENT => true // para que no cierre la conexión y mejorar el rendimiento
    ];

    try {
      $connection = new PDO('mysql:host=dwes.local; dbname=proyecto; charset=utf8', 'userproyecto', '1234', $options);
    } catch (PDOException $error) {
      die($error->getMessage());
      //die es una función que muestra el string que se le pasa
      //y detiene la ejecución del script
    }

    return $connection;
  }
}