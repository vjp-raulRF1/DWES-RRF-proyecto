<?php
require 'app.class.php';
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
      throw new AppException(getErrorString(ERROR_CON_BD));
    }
    return $connection;
  }
}
?>