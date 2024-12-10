<?php

// require_once 'entities/database/IEntity.class.php';
namespace proyecto\entities;

use proyecto\entities\database\IEntity;
class ImagenGaleria implements IEntity
{
    const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';

    private $id;
    private $nombre;
    private $descripcion;
    private $numVisualizaciones;
    private $numLikes;
    private $numDownloads;
    private $categoria;

    public function __construct(string $nombre = '', string $descripcion = '', int $categoria=0, int $numVisualizaciones = 0, int $numLikes = 0, int $numDownloads = 0)
    {
        //Podremos pasarle solo el nombre y la descripcion y el resto por defecto será 0
        $this->id=null;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
        $this->categoria=$categoria;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getNumVisualizaciones(): int
    {
        return $this->numVisualizaciones;
    }

    public function setNumVisualizaciones($numVisualizaciones)
    {
        $this->numVisualizaciones = $numVisualizaciones;

        return $this;
    }

    public function getNumLikes(): int
    {
        return $this->numLikes;
    }

    public function setNumLikes($numLikes)
    {
        $this->numLikes = $numLikes;

        return $this;
    }

    public function getNumDownloads(): int
    {
        return $this->numDownloads;
    }

    public function setNumDownloads($numDownloads)
    {
        $this->numDownloads = $numDownloads;

        return $this;
    }
    
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getUrlPortfolio(): string
    {
        return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre();
    }

    public function getUrlGallery(): string
    {
        return self::RUTA_IMAGENES_GALLERY . $this->getNombre();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'categoria' => $this->getCategoria(),
            'numVisualizaciones' => $this->getNumVisualizaciones(),
            'numLikes' => $this->getNumLikes(),
            'numDownloads' => $this->getNumDownloads()
        ];
    }
}
?>
