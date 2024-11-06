<?php
require_once __DIR__ . '/../exceptions/app_exception.class.php';
require_once 'utils/const.php';
class App
{
    /**
     * @var array
     */
    private static $container = [];
    /**
     * @param $clave
     * @param $valor
     * Recibe tanto la clave donde almacenar el objeto como el propio objeto
     */
    public static function bind($clave, $valor)
    {
        static::$container[$clave] = $valor;
    }
    /**
     * @param string $key
     * @return mixed
     * @throws AppException
     */
    public static function get(string $key)
    {
        //si existe el elemento lo devuelve o sino lanza excepción
        if (!array_key_exists($key, static::$container)) {
            throw new AppException(getErrorString(ERROR_APP_CORE));
        }
        return static::$container[$key];
    }

    public static function getConnection()
    {
        if (!array_key_exists('connection', static::$container)) {
            static::$container['connection'] = Connection::make();
        }
        return static::$container['connection'];
    }
};
?>
