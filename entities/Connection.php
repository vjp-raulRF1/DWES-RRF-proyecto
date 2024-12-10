<?php
// require_once 'entities/app.class.php';
// require_once 'exceptions/app_exception.class.php';

namespace proyecto\entities;
use proyecto\utils;
use proyecto\exceptions\AppException;
use PDOException;
use PDO;
class Connection
{
  public static function make()
  {
    try {
      $config = App::get('config')['database'];
      $connection = new PDO(
        $config['connection'].';dbname='.$config['name'],
        $config['username'],
        $config['password'],
        $config['options']
      );
    } catch (PDOException $PDOException) {
      throw new AppException(utils\getErrorString(ERROR_CON_BD));
    }
    return $connection;
  }
}
?>