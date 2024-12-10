<?php

namespace proyecto\entities;
use proyecto\utils;
class Request{
    public static function uri(){
        return trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/');
    }
}
?>