<?php

    class MyLog{

        private $log;
        // cambiar a private si se descomentan las otras 2 funciones
        private function __construct(string $fileName)
        {
            $this->log= new Monolog\Logger('name');
            $this->log->pushHandler(new Monolog\Handler\StreamHandler($fileName, Monolog\Level::Info));
        }

        public static function load(string $fileName):MyLog{
            return new MyLog($fileName);
        }

        public function add(string $message):void{
            $this->log->info($message);
        }
    }