<?php
    require_once 'database/IEntity.class.php';

    class Partner implements IEntity{

        const RUTA_IMAGENES_ASOCIADOS  = 'images/index/';

        private $nombre;
        private $logo;
        private $descripcion;
        private $id;

        public function __construct(string $nombre='', string $logo='', string $descripcion='') {
            $this->nombre = $nombre;
            $this->logo = $logo;
            $this->descripcion = $descripcion;
            $this->id = null;
        }

        public function getNombre(): string
        {
            return $this->nombre;
        }

        public function setNombre(string $nombre): void
        {
            $this->nombre = $nombre;
        }

        public function getLogo(): string
        {
            return $this->logo;
        }

        public function setLogo(string $logo): void
        {
            $this->logo = $logo;
        }

        public function getDescripcion(): string
        {
            return $this->descripcion;
        }

        public function setDescripcion(string $descripcion): void
        {
            $this->descripcion = $descripcion;
        }

        public function getId() {
            return $this->id;
        }

        public function getUrlAsociados() : string {
            return self::RUTA_IMAGENES_ASOCIADOS.$this->getLogo();
        }

        public function toArray(): array {
            return [
                'id' => $this->getId(),
                'nombre' => $this->getNombre(),
                'logo' => $this->getLogo(),
                'descripcion' => $this->getDescripcion()
            ];
        }
    }
?>